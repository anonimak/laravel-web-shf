# UPDATE versi 0.1.4

-   tambahan field `email` dan `short_name`
-   fitur form pengajuan dan kirim email sudah bisa di module `product/kendaraan`

## PRODUCTION NOTES

-   `php artisan migrate --path=/database/migrations/2021_01_14_040911_create_m__offices_table.php`
-   `php artisan db:seed --class=CreateM_OfficeSeeder`
