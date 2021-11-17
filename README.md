<h2>repo untuk pengembangan website kpuft-ugm</h2>

todo list: <br>
1. clone repo ini 
2. buat file .env, taruh di root folder aplikasinya 
3. `docker-compose up -d` 
4. copy file .sql ke /.docker/dbdata
5. cek apakah berhasil (optional) : `docker-compose ps` 
6. jalankan `docker exec -it kpuft-ugm-db`
7. pindah ke directory `/var/lib/mysql` lalu restore database kpuft_ugm dengan file .sql yang telah dicopy lalu `exit`
8. `docker-compose exec kpuft-ugm-app ls -lha`
9. cek folder storage, pastikan kepemilikannya www-data, kalau belum `sudo chown www-data:www-data storage` 
10. masuk ke container : `docker exec -it kpuft-ugm-app bash`
11. install composer : `composer install` cek instalasi `composer --version`
12. cek artisan : `php artisan --version`
13. generate app-key : `php artisan key:generate`

perintah penting:<br>
clearing:
1. `php artisan config:clear` 
2. `php artisan route:clear` 
3. `php artisan view:clear` 
4. `php aritsan cache:clear`

optimizing (berguna pada tahap produksi):
1. `php artisan config:cache`
2. `php artisan route:cahce`
3. `php artisan view:cache`
4. `php aritsan optimize`
5. `composer install --optimize-autoloader --no-dev`
6. ganti APP_DEBUG di .env menjadi false
7. selengkapnya : laravel.com/docs/8.x/deployment

