<?php

 function getSettings($key = '') {
     return cache('settings')[$key] ?? '';
 }