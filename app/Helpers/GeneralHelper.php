<?php
use Illuminate\Support\Facades\Auth;

if(!function_exists('loginRoute')){
    /*
     *  Return the route after login page for users according to roles
     */
    function loginRoute(){
        $role =  Auth::user()->roles->pluck('name')->first();

        switch ($role) {
            case 'administrator':
                return '/admin';
                break;
            default:
                return '/';
                break;
        }
    }
}

if(! function_exists('include_route_files')){

    function include_route_files($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


