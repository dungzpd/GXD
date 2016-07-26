<?php

namespace Alloy\Facades;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Mail;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\URL;

class MainFacade extends Facade {

    /**
     * Send mail using smtp.
     *
     * @return boolean
     */
    public static function sendEmail($template, $data) {
	if (empty($data)) {
	    return false;
	}

	$mailContent = new \StdClass();
	$mailContent->subject = '[GXD - Hệ thống đào tạo] ' . $data['subject'];
	$mailContent->from = $data['from'];
	$mailContent->to = $data['to'];
	$mailContent->name = $data['name'];
	$mailContent->link = $data['link'];

	!empty($data['password']) ? $mailContent->password = $data['password'] : 1 == 1;     
	$params = ['message' => $mailContent, 'link' => $mailContent->link, 'name' => $mailContent->name];
	!empty($data['password']) ? $params['password'] = $data['password'] : 1 == 1;

	Mail::send($template, $params, function ($m) use ($mailContent) {
	    $m->from($mailContent->from, '[GXD - Hệ thống đào tạo]');
	    $m->to($mailContent->to, $mailContent->name)->subject($mailContent->subject);
	});

	return true;
    }

    /**
     * Generate link sort using in list view backend
     *
     * @return string
     */
    public static function generateSort($data) {
	$params = [];

	$sort = ($data['field'] === $data['field_vs']) ? (($data['sort'] == 'desc' || $data['sort'] == null) ? 'asc' : 'desc') : 'asc';
	$params = [
	    'field' => $data['field'],
	    'sort' => $sort
	];

	if (isset($data['keyword']) && !empty($data['keyword'])) {
	    $params['keyword'] = $data['keyword'];
	}

	$url = URL::action($data['link'], $params);
	$link = '<a href="' . $url . '"><i class="fa fa-sort-amount-' . $sort . '"></i></a>';

	return $link;
    }

}
