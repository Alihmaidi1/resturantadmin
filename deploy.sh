set -e

echo "Start Deploy :)"

(php artisan down)|| true

git pull origin master


php artisan up

echo "Finish Deployment :)"
