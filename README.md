### Config awal server lokal di CI4 ###
Cari file Codeigniter.php di System/Codeigniter.php

#Ubah config awal di file System/CodeIgniter.php
baris 185

locale_set_default($this->config->defaultLocale ?? 'en');

#Menjadi 

if( function_exists('locale_set_default' ) ) :
	locale_set_default($this->config->defaultLocale ?? 'en');
endif;

Buat database dengan nama : media_pembelajaran
lalu buka terminal di root project dan jalankan : php spark migrate 
