<?php

return[
    
    [

    'icon'=>'nav-icon fas fa-tachometer-alt',
    'title'=>'Dashboard',
    'route'=>'dashboard',
    'active'=>'dashboard',
    ],

   
    [

    'icon'=>'far fa-circle nav-icon',
    'title'=>'Categories',
    'route'=>'categories.index',
    'badge'=>'new',
    'active'=>'categories.*',
    ],
    [

    'icon'=>'far fa-circle nav-icon',
    'title'=>'Products',
    'route'=>'categories.index',
    'active'=>'products.*',
    ],
    [

    'icon'=>'far fa-circle nav-icon',
    'title'=>'Other',
    'route'=>'categories.index',
    'active'=>'others.*',
    ],


];