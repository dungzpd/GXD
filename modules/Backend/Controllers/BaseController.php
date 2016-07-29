<?php

namespace Backend\Controllers;

use Illuminate\Routing\Controller;
use Alloy\Models\Roles;
use Auth;
use Alloy\Facades\Run;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class BaseController extends Controller
{

    protected $perPage = 20;
    protected $dirAvatar = 'backend/upload/images/avatars/origins';
    protected $dirQuestion = 'backend/upload/images/questions/origins';
    protected $dirAnswer = 'backend/upload/images/answers/origins';

    public function __construct()
    {
        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }

        $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff/sale');
    }

    protected function subFilterRoles($roles, $haystack, $type)
    {
        $result = array();
        foreach ($roles as $role) {
            if (!in_array($role['name'], $haystack)) {
                continue;
            }

            if (!empty($type)) {
                $result[] = $role['id'];
            } else {
                $result[] = array('id' => $role['id'], 'name' => $role['name']);
            }
        }

        return $result;
    }

    public function filterRoles($role, $type = null)
    {
        $roles = Roles::all();
        $result = array();

        switch ($role) {
            case 'admin':
                $result = $this->subFilterRoles($roles, array('admin', 'sale_lead', 'teacher_internal', 'teacher_external', 'sale', 'user', 'user_mode', 'staff'), $type);
                break;
            case 'sale_lead':
                $result = $this->subFilterRoles($roles, array('sale', 'user', 'user_mode'), $type);
                break;
            case 'teacher_internal':
                $result = $this->subFilterRoles($roles, array('user', 'user_mode'), $type);
                break;
            case 'teacher_external':
                $result = $this->subFilterRoles($roles, array('user', 'user_mode'), $type);
                break;
            case 'staff':
                $result = $this->subFilterRoles($roles, array('user', 'user_mode'), $type);
                break;
            case 'sale':
                $result = $this->subFilterRoles($roles, array('user', 'user_mode'), $type);
                break;
            case 'user':
                break;
            case 'user_mode':
                break;
            default :
                break;
        }

        return $result;
    }

    public function uploadVideos(Request $request)
    {
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

    public function file($disk, $fileName)
    {
        $file = null;

        if (!empty($disk) && !empty($fileName)) {
            if (Storage::disk(Run::disk($disk))->has($fileName)) {
                $file = Storage::disk(Run::disk($disk))->get($fileName);
                $minType = Storage::disk(Run::disk($disk))->mimeType($fileName);
                $headers = array(
                    'Content-type' => $minType,
                    'Content-Disposition' => 'inline; filename="' . $fileName . '"'
                );
                return response()->file($file, $headers);
            }
        }

        return null;
    }

    /**
     * Provide a streaming file with support for scrubbing
     *
     * @param {string} $disk, {string} $fileName
     * @return {Response} stream
     *
     **/
    public function streamFile($disk, $fileName)
    {
        $file = null;
        $start = 0;
        $fileSize = 0;
        $length = 0;
        $size = 1;
        $minType = null;
        $stream = null;
        $statusCode = 200;
        $headers = array(
            'Accept-Ranges' => 'bytes',
            'Content-Transfer-Encoding' => 'binary',
        );

        if (!empty($disk) && !empty($fileName)) {
            if (Storage::disk(Run::disk($disk))->has($fileName)) {
                $file = Storage::disk(Run::disk($disk))->get($fileName);
                $length = $fileSize = Storage::disk(Run::disk($disk))->size($fileName);
                $minType = Storage::disk(Run::disk($disk))->mimeType($fileName);
                //$path = storage_path('app/' . str_replace('-', '/', $disk) . '/' . $fileName);
                $storagePath = Storage::disk(Run::disk($disk))->getDriver()->getAdapter()->getPathPrefix();
                $path = $storagePath . $fileName;
                $stream = fopen($path, "r");

                // Check for request for part of the stream
                $range = \Request::header('Range');
                if ($range != null) {
                    $eqPos = strpos($range, "=");
                    $toPos = strpos($range, "-");
                    $unit = substr($range, 0, $eqPos);
                    $start = intval(substr($range, $eqPos + 1, $toPos));
                    $success = fseek($stream, $start);
                    if ($success == 0) {
                        $size = $fileSize - $start;
                        $statusCode = 206;
                        $headers["Accept-Ranges"] = $unit;
                        $headers["Content-Range"] = $unit . " " . $start . "-" . ($fileSize - 1) . "/" . $fileSize;
                    }
                }

                // Set header
                $headers['Content-Type'] = $minType;
                $headers['Content-Disposition'] = 'inline; filename="' . $fileName . '"';
                $headers['Content-Length'] = $size;
            }
        }
        if (empty($stream)) {
            return null;
        }

        return \Response::stream(function () use ($stream, $start, $length) {
            fseek($stream, $start, SEEK_SET);
            echo fread($stream, $length);
            fclose($stream);
        }, $statusCode, $headers);
    }

    /**
     * Protected function upload file
     *
     * @param {string} $field, {string} $path, {string} $aliasName, {string} $oldFile
     * @return string|boolean
     *
     * */
    protected function uploadFile($field = null, $path = null, $aliasName = null, $oldFile = null)
    {

        if (!empty($field) && !empty($path) && \Request::hasFile($field)) {

            // Delete old file before upload new file
            $this->deleteFile(Run::disk(Run::disk($path)), $oldFile);
            $file = \Request::file($field);
            $fileName = implode('.', array(run::makeName($aliasName), $file->getClientOriginalExtension()));

            try {
                ini_set('memory_limit', '-1');
//                ini_set('memory_limit','1024M');
              //  die($file->getRealPath());
                if (Storage::disk(Run::disk($path))->put($fileName, file_get_contents($file->getRealPath()))) {
                  //  die("vao day".$path);
                    return $fileName;
                }
               // die("Khong vao".$file->getRealPath());
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }

    /**
     * Protected function delete file
     *
     * @param {string} path, {string} $oldFile
     * @return boolean
     **/
    protected function deleteFile($path = null, $oldFile = null)
    {
        if (!empty($path) && !empty($oldFile) && Storage::disk(Run::disk($path))->has($oldFile)) {
            return Storage::disk(Run::disk($path))->delete($oldFile);
        }
        return false;
    }

    public function removeFile($disk = null, $fileName = null)
    {
        return $this->deleteFile($disk, $fileName);
    }

}
