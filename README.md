Az alkalmazás Laravel Blade template-el készült.

Az alkalmazás futtatásához szükséges parancsok:
- Adatbázis létrehozása: rickandmorty
- composer install parancs futtatása a dependencies telepítéséhez (A projekt softonic/graphql-client-et és kyslik/column-sortable segítségével épült fel)
- php artisan migrate parancs futtatása, az adatbázis tábláinak létrehozásához
- php artisan serve futtatása, az alkalmazás elindításához
- .env file megtalálható a fájlok között

Alapbeállításon a localhost:8000/episodes címen található az alkalmazás
Az alkalmazás web route-okon keresztül kommunikál, blade templateket használ és az EpisodeController kezeli a methodokat

A div bal felső sarkában található "Download episodes" linkre kattintva, feltölti az adatbázisban található "episodes" táblát az epizódok nevével, számával és a "characters" táblát az epizódok számával és bennük szereplő karakterekkel. Az oldal redirectben visszatér az /episodes url-re és egy rendezhető, lapozható táblában mutatja meg az eredményeket, felül pedig szűkíteni lehet letrehozástól létrehozásig a találatokat.

A feladatok megoldási ideje: kb. 5-6 óra
A projekt nagy részét a graphQL megismerésével töltöttem el, ez körülbelül 2-3 órát vett igénybe, hogy átnézzem a dokumentációt és megértsem, hogyan is kezeljem a visszaadott eredményeit.
Az adatbázisműveletek megírása a foreach ciklussal körülbelül 1,5 óra volt.
A blade oldalon lévő táblázat elkészítése és a read() method megírása a Sortable dependency megtalálásával és telepítésével kb 1,5 óra volt.
