Repositori ini dibangun dengan Laravel versi 6.0 ke atas. Setelah melakukan clone dari repositori ini, lakukanlah langkah-langkah di bawah ini untuk menjalankan project.

masuk ke direktori 

`$ cd final-project-social-media`

jalankan perintah composer install untuk mendownload direktori vendor

`$ composer install`


buat file .env lalu isi file tersebut dengan seluruh isi dari file .env.example (copy isi dari .env.example lalu paste di file .env)


jalankan perintah php artisan key generate


`$ php artisan key:generate`

Tambahan: Untuk pengerjaan di laptop/PC masing-masing, sesuaikan nama database, username dan password nya di file .env dengan database kalian.

Setelah itu kalian bisa lanjut. jangan lupa untuk menjalankan server laravel
`$ php artisan serve`