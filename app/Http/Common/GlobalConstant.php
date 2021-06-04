<?php

namespace App\Http\Common;


class GlobalConstant {

    public function header($header){
        $user_agent_info =  $this->getUserAgent($header);
//        dd($user_agent_info);
        defined('CLIENT') or define('CLIENT', $user_agent_info['clients']);
        defined('APP_VERSION') or define('APP_VERSION', $user_agent_info['version_code']);
        defined('VERSION') or define('VERSION', $user_agent_info['version']);
        defined('IMEI') or define('IMEI', $user_agent_info['imei']);
        defined('MODEL') or define('MODEL', $user_agent_info['model']);
        defined('SYSTEM') or define('SYSTEM', $user_agent_info['system']);
        defined('FRAMEWORK') or define('FRAMEWORK', $user_agent_info['framework']);
    }

    protected function getUserAgent($userAgent, $type = '')
    {
        $agent = strtolower($userAgent);
        preg_match_all('/([^\/\s]*)\/([^\s]*)/', $agent, $agent_arr);
        if (is_array($agent_arr) && !empty($agent_arr)) {
            $agent_tmpl = array_combine($agent_arr[1], $agent_arr[2]);
        }

        return $agent_tmpl;
    }

}
