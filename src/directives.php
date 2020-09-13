<?php

return [

    /**
     * Show the values of given object, if value is empty it will return N/A by default.
     *
     * @show(object.property)
     * @show(object.childObject.property)
     *
     * You can use it by both ways.
     */

    'show' => function ($record) {

        $data = explode('.', $record);
    
        $var = array_shift($data); // take variable into $var
        $properties = array_values($data);

        if (count($properties) > 1) { // if nested properties are passed 
            $prop1 = $properties[0];
            $prop2 = $properties[1];

            return "<?php 
                     
                     if(!empty(($$var)->$prop1) && !empty(($$var)->$prop1)) {
                          echo ($$var)->$prop1->$prop2;
                     } else {
                         echo 'N/A'; 
                     }
                      ?>";
        }

        $prop = $properties[0]; // if there is only one property

        return "<?php 
                     
                     if(!empty(($$var)->$prop))) {
                         echo ($$var)->$prop;
                     } else {
                        echo 'N/A';
                     }
                     
                     ?>";
    },

    /**
     * Date Time Directives, to show date time or any time format from given objects property.
     *
     * @time(object.property) // it will take default date time format "Y-m-d H:i:s"
     * @time(object.property | jS M, Y) here you can pass your custom time format by separating param pipe (|)
     * @time((object.childObject.property | jS M, Y)) // You can also show the value of child objects property.
     *
     */

    'time'       => function ($record) {
        $data = explode('.', $record);
        $format = 'Y-m-d H:i:s';

        $var = array_shift($data); // take variable into $var
        $properties = array_values($data);

        if (count($properties) > 1) { // if nested properties are passed 
            $params = explode('|', $properties[1]);
            $format = (count($params) > 1) ? $params[1] : $format;
            $prop1 = $properties[0];
            $prop2 = (count($params) > 1) ? $params[0] : $properties[1];

            return "<?php 
                     
                     if(!empty(($$var)->$prop1) && !empty(($$var)->$prop1)) {
                          echo date_format(($$var)->$prop1->$prop2, '$format');
                     } else {
                         echo 'N/A'; 
                     }
                      ?>";
        }

        $property = $properties[0]; // if there is only one property
        $params = explode('|', $property);
        $format = (count($params) > 1) ? $params[1] : $format;
        $property = (count($params) > 1) ? $params[0] : $property;

        return "<?php 
                     
                     if(!empty(($$var)->$property)) {
                         echo date_format(($$var)->$property, '$format');
                     } else {
                        echo 'N/A';
                     }
                     
                     ?>";
    },

    /**
     * Directive to show human readable time from given object's property.
     *
     * it wil return time like "1 Minutes Ago", "2 Minutes Ago", etc.
     *
     * @human_time(object.property)
     * @human_time(object.childObject.property)
     */
    'human_time' => function ($record) {
        $data = explode('.', $record);

        $var = array_shift($data); // take variable into $var
        $properties = array_values($data);

        if (count($properties) > 1) { // if nested properties are passed 
            $prop1 = $properties[0];
            $prop2 = $properties[1];

            return "<?php 
                     
                     if(!empty(($$var)->$prop1) && !empty(($$var)->$prop1)) {
                          echo Illuminate\Support\Carbon::parse((($$var)->$prop1->$prop2)->diffForHumans();
                     } else {
                         echo 'N/A'; 
                     }
                      ?>";
        }

        $property = $properties[0]; // if there is only one property

        return "<?php 
                     
                     if(!empty(($$var)->$property)) {
                         echo  Illuminate\Support\Carbon::parse(($$var)->$property)->diffForHumans();
                     } else {
                        echo 'N/A';
                     }
                     
                     ?>";
    },
];
