<?php

namespace Illuminate\Support;


// 5
// class Config
// {
//     // 3ayz a3ml add le function deh
//     //$config['db.hosts'] = 'localhost'
// }



// 9
// ArrayAccess ha5oot befor it \ or a3ml use ArrayAcess; bas 3ashan dah global name space
class Config implements \ArrayAccess
{

    // //11
    // protected array $items;
    // public function __construct($items)
    // {
    //     $this -> items = $items;
    // }

    // //10 public function offsetExits,Set,Get,Unset we han5ly el function fadyaa mosh feha 7aga fe 2wel step
    // public function offsetExists($key)
    // {

    // }

    // public function offsetSet($key , $value)
    // {

    // }

    // public function offsetGet($key)
    // {

    // }

    // public function offsetUnset($key)
    // {

    // }

    // //13
    // public function all()
    // {
    //     return $this -> items;
    // }

    // //15
    // public function getMany($keys)
    // {
    //     $config = [];

    //     foreach ($keys as $key => $default) 
    //     {
    //         if(is_numeric($key))
    //         {
    //             [$key , $default] = [$default , null];
    //         }

    //         $config[$key] = Arr::get($this -> items , $key, $default);
    //     }

    //     return $config;
    
    // }


    protected array $items = [];

    public function __construct($items)
    {
        foreach ($items as $key => $item) {
            $this->items[$key] = $item;
        }
    }

    public function has($keys)
    {
        return Arr::has($this->items, $keys);
    }

    public function get($key, $default = null)
    {
        if (is_array($key)) {
            return $this->getMany($key);
        }

        return Arr::get($this->items, $key, $default);
    }

    public function getMany($keys)
    {
        $config = [];

        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                [$key, $default] = [$default, null];
            }

            $config[$key] = Arr::get($this->items, $key, $default);
        }

        return $config;
    }

    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }

    public function push($key, $value)
    {
        $array = $this->get($key);

        $array[] = $value;

        $this->set($key, ...$array);
    }

    public function all()
    {
        return $this->items;
    }

    public function exists($key)
    {
        return Arr::exists($this->items, $key);
    }

    public function offsetGet($offset)
    {
        $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->set($offset, null);
    }

    public function offsetExists($offset)
    {
        $this->exists($offset);
    }
}