<?php
require_once './src/Support/helpers.php';

use Dotenv\Dotenv;

use Illuminate\View\View;

use PHPUnit\Framework\TestCase;



// class ViewTest extends TestCase
// {
//     // ----5
//     protected View $view;

//     public function setUp():void
//     {   
//         require_once '../../../src/Support/helpers.php';   // 9 >>> adjust the directory only>>>../../ 
//         $this -> view = new View();
//     }

//     protected function getNonAccessibleMethod (string $name)
//     {
//         $reflection = new ReflectionClass($this ->view);
//         $method = $reflection -> getMethod($name);

//         if ($method -> isPrivate() || $method -> isProtected())
//         {
//             $method -> setAccessible(true);
//         }

//         return $method;
//     } 

//     //---- 4
//     public function test_it_gets_the_content ()
//     {
//         //----6
//             // $content = View::getBaseContent();   >>> equale to invoke this -> view

//             // srt_contains($content, '{{content}}') >>>> euqale to asssert till :: getbasecontent

//         $this -> assertStringContainsString(
//             '{{content}}',
//              $this-> getNonAccessibleMethod('getBaseContent')->invoke($this -> view)
//         );
       
//         // str_contains('hello world', 'hello');  in php8 check hello inside hellow world or nor
//     }    


//     // 8-----
//     public function test_it_has_app_name_in_title_from_the_env_variable()
//     {

//         $this -> assertStringContainsString(
//             env("APP_NAME"),
//              $this-> getNonAccessibleMethod('getBaseContent')->invoke($this -> view)
//         ); 

//     }
   

// }

class ViewTest extends TestCase
{   
    protected View $view;
     // 19--- lesa el emthod beta3 el View mosh ma2good a3emlo include ll function beta3to
    protected function setUp():void
    {
        $this -> view = new View();

        // ---21
        $dotenv = Dotenv::createImmutable(base_path()); // ma3a tany test to include env
        $dotenv->load();
    }

    // 18-  ha3mal el reflection lel function 
    protected function getNonAccessibleMethod(string $method)
    {
        $reflection = new ReflectionClass($this -> view);

        $method = $reflection -> getMethod($method);

        if ($method -> isPrivate() || $method -> isProtected ()){
            $method -> setAccessible(true);
        }
        return $method;
    }

    // 17--
    public function test_it_has_content_placeholder_in_main_layout()
    {
        // {{content}} 3ayez ashoof a3eml check 3la {{content}} mawgod wala la2
        // ba3mel test lel function getBaseContent
        $this->assertStringContainsString(
                '{{content}}',
                $this -> getNonAccessibleMethod('getBaseContent') -> invoke
                ($this ->view)
            ); 
        // dd(
        //     $this -> getNonAccessibleMethod('getBaseContent') -> invoke
        //     ($this ->view)
        // );          
    }

    // 20 --
    public function test_it_has_the_env_app_name_as_title_in_main_layout()
    {
        $this->assertStringContainsString(
                env('APP_NAME'),
                $this -> getNonAccessibleMethod('getBaseContent') -> invoke
                ($this ->view)
            ); 
                
    }

    public function test_it_does_not_contain_content_placeholder_for_view_content()
    {
        $this->assertStringNotContainsString(
            '{{content}}',
            $this -> getNonAccessibleMethod('getViewContent') -> invokeArgs
            ($this ->view, ['home'])
        ); 
    }
}