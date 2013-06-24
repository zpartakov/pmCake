#scp a copy of pm db on akademia.ch
cd /var/www/pmcake/app
cp ~/.netrc.www.akademia.ch  ~/.netrc
mysqldump --add-drop-table akademiach4 > akademiach4.sql
lftp -e "open www.akademia.ch; cd ../data; put /var/www/pmcake/app/akademiach4.sql; exit"
