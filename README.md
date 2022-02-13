<h2>repo untuk pengembangan website kpuft-ugm</h2>

todo list: <br>
1. clone repo ini 
2. buat file .env, taruh di root folder aplikasinya 
3. `docker-compose up -d` 
4. copy file .sql ke ./.docker/dbdata
5. cek apakah berhasil (optional) : `docker-compose ps` 
6. jalankan `docker exec -it kpuft-ugm-db`
7. pindah ke directory `/var/lib/mysql` lalu restore database kpuft_ugm dengan file .sql yang telah dicopy lalu `exit`
8. set firewall untuk docker
9. profit!!!

perintah penting:<br>
clearing:
1. `php artisan config:clear` 
2. `php artisan route:clear` 
3. `php artisan view:clear` 
4. `php aritsan cache:clear`

optimizing (berguna pada tahap produksi):
selengkapnya : laravel.com/docs/8.x/deployment

