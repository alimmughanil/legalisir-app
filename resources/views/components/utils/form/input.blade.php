@props(['label', 'labelClass', 'inputClass', 'id', 'type', 'name', 'required'])

@php
    $inputMaterialStyle = 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
    $labelMaterialStyle = 'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-100 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-100 peer-focus:-translate-y-8';
    
    $mainInputClass = isset($inputClass) ? $inputClass : $inputMaterialStyle;
    $mainLabelClass = isset($labelClass) ? $labelClass : $labelMaterialStyle;
    $mainId = isset($id) ? $id : 'inputId';
    $mainName = isset($name) ? $name : 'inputName';
    $mainType = isset($type) ? $type : 'text';
    $mainRequired = isset($required) ? $required : false;
@endphp

<div>
    <div class="relative z-0 w-full group">
        <input
            {{ $attributes->merge([
                'type' => $mainType,
                'id' => $mainId,
                'name' => $mainName,
                'class' => $mainInputClass,
                'required' => $mainRequired,
            ]) }}
            placeholder=' ' />
        <label
            {{ $attributes->merge([
                'for' => $mainId,
                'class' => $mainLabelClass,
            ]) }}>{{ $label }}</label>
    </div>
</div>
