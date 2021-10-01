<?php

namespace Illuminate\View;

class View{

    // el function deh hageeb el base content betgeeb el file we bet3mloo return
    protected  function getBaseContent(){
        //return '{{content}}';   delete return and add inculde once
        //13---  ob start 3ashan te3ml hold el data deh , ha3ml hold el data ely hategy men {{content}} zay el buffering yegeb el data bas lesa mosh hat3mlha show 3'er lama atloopha
        ob_start();
        //10---- han3ml include once
        // include_once view_path() . '/layouts/main.php';
        // 22
        include view_path() . '/layouts/main.php'; 

        return ob_get_clean(); // 14 -- betegeeb el content low el buffer mawgood low mosh 3amel obstart mafeesh 7aga hatgey 5ales

    }
    // 16 -----
    public static function make($view, $params =[])
    {
        $baseContent = self::getBaseContent();
        $viewContent = self::getViewContent($view, params: $params);
        
        echo str_replace("{{content}}" , $viewContent , $baseContent);  // ha3mel replace le kelmet content fe el viewContent 
    }

    public static function makeError($error)
    {
        self::getViewContent($errors, true);
    }

    //beta5ood string men el view ely 3ayez a3mloo load we ba3d keda ba3mel check el arguement deh isError la2 false we low error ye3eml contantinate error , haftrd een ay 7aga 3ayz a renderha hatkoon view 3ady we baftrd eno mafesh ay parameter mo3ayen
    // 15 -- 3amlna el funuction $view,$isError ......  3ashan teb2a le aktaar men mot3'ayer
    protected  function getViewContent( $view,  $isError = false,  $params =[])
    {
        $path = $isError ? view_path(). 'errors/' : view_path();

        // if str_contains view '.'  ha3mel eno hayd5ol gowa le file low gowaah file tany ye3mel extension '.' le3'ayet lama yela2y el file el neha2y ely .php low mafeesh ay files ye3mel return
        if (str_contains($view,'.')){
            $views = explode('.', $view);
            foreach ($views as $view ) {
               if(is_dir ($path . $view)) {   // check low howaa folder is_dir directory ba3eml el path . view
                   $path = $path . $view . DIRECTORY_SEPARATOR;
               }
            } //kedaa ma3aya instance views

            $view = $path .end($views). '.php';
        }else{
            $view = $path . $view .'.php';
        } 

        // foreach($params as $key => $value ){   // $key dah variable 3ayze a3mlo set 3ashan ageeb meno ay 7aga ba3mel $$
        //     $$key = $value;   // $$ variable variable
        // }
        // 16 ---
        extract($params);   // badaaal el foreach ely fatet
        
        if($isError) {
            include $view;
        } else {
            ob_start();
            include $view;
            return ob_get_clean();
        }
            
    }
}