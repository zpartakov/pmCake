cd /var/www/pmcake/app
killbakall
cp ~/.netrc.www.akademia.ch  ~/.netrc
mysqldump --add-drop-table akademiach4 > akademiach4.sql
#modify the path of webcalendar for using it on akademia
replace 'http://129.194.18.197/webcendar/' 'http://www.akademia.ch/intranet/webcalendar' -- akademiach4.sql
#mirroring pmcake files
lftp -e "open www.akademia.ch;mirror -R /var/www/pmcake/app /web/intranet/pmcake/app;exit"
lftp -e "open www.akademia.ch; chmod -R 777 /web/intranet/pmcake/app/tmp; exit"
lftp -e "open www.akademia.ch; rm -fr /web/intranet/pmcake/app/tmp/cache/persistent/* ; exit"
lftp -e "open www.akademia.ch; rm -fr /web/intranet/pmcake/app/tmp/cache/models/* ; exit"
lftp -e "open www.akademia.ch; rm -fr /web/intranet/pmcake/app/tmp/cache/views/* ; exit"
lftp -e "open www.akademia.ch; rm -fr /web/intranet/pmcake/app/tmp/cache/views/* ; exit"
#backup db on infomaniak
lftp -e "open www.akademia.ch; cd ../data; put /var/www/pmcake/app/akademiach4.sql; exit"
#backup db money on infomaniak
mysqldump --add-drop-table akademiach10 > akademiach10.sql
lftp -e "open www.akademia.ch; cd ../data; put /var/www/pmcake/app/akademiach10.sql; exit"
#backup polar
#lftp -e "open www.akademia.ch; mirror -R /var/www/polar/data/pages/intranet2/polars/polar /web/dokuwiki/data/pages/intranet2/polars/polar; exit"
#lftp -e "open www.akademia.ch; chmod -R 777 /web/dokuwiki/data/pages/intranet2/polars/polar; exit"
