<?php

namespace GLParam;

class Param{

	private $config;

    public function __construct($config)
    {
    	$this->config = $config;
    }

    public function getCityParams()
    {
        foreach ($this->config as $value)
        {
            $param = $value['param'];
            $dohandle = false;
            $_args = [];

            foreach ($param as $v)
            {
                if(request()->$v)
                {
                    $dohandle = true;
                    $_args[$v]=request()->$v;
                }else{
                    $dohandle = false;
                    break;
                }
            }
            if($dohandle)
            {
                $handle = $value['handle'];
                return call_user_func_array([$handle,'handle'],[$_args]);
            }
        }

        return false;
    }

   
}
