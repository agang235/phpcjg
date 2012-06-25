<?php
/**
 * 反射封装类
 *  $nr = &Reflc::get_ref('test');
 *  var_dump($nr->getmethods());
 *
 *  var_dump(Reflc::get_declared_classes());
 * 
 *  echo Reflc::get_digest($t);
 */
class Reflc{
    const ONLY_UDF = TRUE; //只关注udf
    const NOT_ONLY_UDF = FALSE; //所有类
      
    /**
     * 得到一个类或对象的反射实例
     *
     * @param object $cls
     * @return
     */
    static function get_ref($cls)
    {
        $ref = null;
        if(is_string($cls))
        {
            if(in_array(strtolower($cls), array_map('strtolower', get_declared_classes())))
            {
                $ref = new ReflectionClass($cls);
            }
            else
            {
                echo 'class or object is not exists!!',"\n";
                return FALSE;
            }
        }
        else if(is_object($cls))
        {
            $ref = new ReflectionObject($cls);
        }
          
        return  $ref;
    }
      
    /**
     * 已定义的类列表
     *
     * @param object $only_udf [optional]
     * @param object $export_detail [optional]
     * @return
     */
    static function get_declared_classes($only_udf = TRUE, $export_detail = FALSE){
        $classes = array();
        foreach(get_declared_classes() as $class)
        {
            $reflectionClass = new ReflectionClass($class);
            if(!$only_udf OR ($only_udf && $reflectionClass->isUserDefined()))
            {
                $classes[] = $class;
                if($export_detail)
                {
                    ReflectionClass::export($reflectionClass);
                }
            }
        }
        return $classes;
    }
      
    static function get_digest($cls)
    {
        $cls = self::get_ref($cls);
        if($cls)
        {
              
            $methods = implode(',', $cls->getMethods());
            return <<<EOF
class name: {$cls->getName()}

class parent: {$cls->getParentClass()}

class file: {$cls->getFileName()}

class methods: {$methods}
EOF;
        }
    }
      
}