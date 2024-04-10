для установки зависимостей в проект после кланирования его с гита: composer install --ignore-platform-reqs


Тестовый проект для обучения. Здесь будет мой опыт, расширяем знания и понимание php и фреймворка laravel.

**_ разбор структуры фрейма_**

app - основной каталог с приложением, где в основном пишется код, вся бизнес-логика приложения...
bootstrap - отвечает за загрузку фреймворка, файл app.php инициализирует фреймворк...
config - хранит файлы конфигурации
database - каталог для работы с бдшками
public - корень проекта
resources - ресурсы проекта, js код, файлы предсталений, стили и др.
routes - файлы с маршрутами
storage - хранит всю статику, статические файлы, которые будем загружать в кэш фрейма, в сессии

**_Routing_**
для работы с mvc приложением, без исп-ния api, достаточно прописывать routes в web.php
есть несколько полезных фич, используя которые можно писать приложения. Для создания роутов с полной CRUD, можно использовать ключевое слово resource:
Route::resource('photos', PhotoController::class)->names('photos');- Это объявление одного маршрута создает несколько маршрутов для обработки различных действий с ресурсом.

можно сгруппировать роуты в группу:
Route::group(['prefix' => 'news'], function(){
Route::get('/', [IndexController::class, 'index']);
})

именования роутов методом -> name("NAME") рекомендуется для того, чтобы используя этот нейминг, можно навигироваться по данным адресам

**_Conrtollers_**
основная часть разработки начинается с контроллера. Для создания контроллера в php используется комманда php artisan make:controller NAME
так же, возможно создание контроллера с CRUD функциями по умолчанию, для этого в конце достаточно добавить --resource

для получения qury параметров исп-ся либо $reqest->query() как параметр либо функция хелпер request()->query(). Функцию хелпер можно вызывать из различных мест приложения
чтобы получить все параметры исп-ся request()->all()
чтобы получить опр-ные поля - $only = $request->only(['firstinput', 'secInput'])
Проверка на то, существуют ли данные осуществляется при помощи метода has() например $request->has('title')

для проверки url можно исп-ть метод is пример request()->is('/name')

return Redirect::route('photos.index'); Для возврата на опр-ную страницу;

return Redirect::route('photos.index')->with(['success' => 'Фото удалено']); c сообщением

**_Views или представления _**
для mvc в ларавеле основным шаблонизатором, который идёт из коробки яв-ся blade. А в контроллере нужно вернуть флаг withInput();

для возврата представляения в контроллере исп-ся метод view() пример: return view('admin.news.index'); точка указывает на вложенность.
вторым параметром в хелпере view можно передать данные в массиве. return view('admin.news.index', ['name'=> $this->fack]);

чтобы сохранить данные в формах при перезагрузки исп-ся хэлпер old('name')

**_Blade шаблонизатор_**
Шаблонизатор - программа(либа) позваляющая исп-ть html-шаблоны для генерации конечных страниц.

вывод переменных в blade "{{$name}}"
для вывода не экранированных данных "{!! $name !!}"
для ветвлений и циклов в нутри blade можно добавить символ @ перед блоком : @if() @endif @foreach($item as $array ) @endforeach
внутри циклов, шаблонизатор добавляет переменную $loop который позваляет гибко работать с переменными цикла

Наследование шаблонов: для наследования layout исп-ся @extends('layouts.name')
для встаки контента в шаблоны исп-ся дериктива @yield('name_content') в самом шаблоне, а в дочернем элементе @section('name_content')

компоненты в шаблонизаторе выводятся с помощью директивы <x-name></x-name>

push и stack - дерективы исп-емые для подключения скриптов и стилей конструкция @push('js') @endpush что нужно добавить а @stack('js')

include - директива для подключения каталогов

**_ Валидация_**
Внутри контроллера важно валидировать входные данные, в ларавеле удобный инструмент для этого validate, вызываемый на request
$request->validate(['nameResData'=>['required', 'string', 'min:3', 'max:35' ]]), который принимает массив правил. 
при неверном заполнении вернётся массив ошибок, которые можно обработать в шаблонизаторе @if($errors->any()),
другой способ исп-ть дериктиву @error('nameInput')<div>{{$message}}</div> @enderror.
Хорошей практикой считается вынос валидации в request диреторию. Для создания обработчика исп-ся команда- php artisan make:request NameRequest,
а для его применения в контроллере, просто в методе вызываем реквест с моделью этого класса пример: public function store(NameRequest $request){ retutn asdawd}

**_Работа с файлами_**
Проблема с лимитом на загружаемые файлы решается в php.ini который находиться не в проекте,
а в файлах самого php. В файле ишем строчку с upload_max_filesize и устанавливаем значения
для работы с файлами в папке storage используется Storage::allFiles($directory);

**_artisan_**
чтобы посмотреть все команды artisan пишем php artisan list

**_Сервис провайдер и контайнер _**

для подклбчения нового сервиса в приложение используется механизм ларавел. Для начала создаётся провайдер командой php artisan make:provider NameProvider.
В создавшемся провайдере в методе регистр нужно его зарегистрировать $this->app->bind(CalculateSumService::class, function ($app){
return new CalculateSumService();)} здесь app это контейнер приложения. Так же необходимо зарегестрировать этот провайдер в файле config/app.php

**_фасады_**
Фасады - обстракция, обеспечивающая статический интерфейс к классам, которые доступны в сервис-контейнере. По сути статическая обёртка над классами.

**_middleware_**
Промежуточное ПО, для проверки и филтрации запросов.
Создание так-же с помощью команды php artisan make:middleware Name

**_Миграции _**
своеобразная система контроля версий для бд, позволяющая менять структуру бд.

для создания миграций исп-ся команда php artisan make:migration create_names_table --create=names
эта команда создаст миграцию для бд, которая создаст таблицу с именем names.
php artisan make:migration add_collumname_to_names_table --table=names а эта комада добавит строку в таблицу

для применения миграций исп-ся комманда php artisan migrate

Для отката миграций исп-ся команда php artisan migrate:rollback, она откатывает миграции нп один шаг.
Откат всех миграция php artisan migrate:reset

**_Фабрики и Сиды_**

фабрики позволяют генерировать тестовые данные на основе созданных моделей.
Храняться фабрики в папке database/factories для создания фабрики исп-ся комманда php artisan make:factory NameFactory
Они генерируются библиотекой faker данные по моделям.

Сиды - просто тестовые данные
создание сидов: php artisan make:seeder NameSeeder;
запускать сиды можно через php artisan db:seed - но в этом случае нужно чтобы нужный сиды был зареган в DatabaseSeeder.php,
либо через php artisan db:seed --class=UserSeeder
так же можно использовать php artisan migrate:fresh --seed эта команда обновит все таблицы и накатит уже с сидами;

**_Конструкторы запросов_**
Для работы с БД в laravel есть удобный фасад use Illuminate\Support\Facades\DB; Благодаря этому фасаду можно обращаться к БД и работать с ней.
Для получения данных из БД используется DB::table("users")->get(); где table указывается название таблички, а метод гет позваляет получить коллекцию данных, либо определённые колонки.
вместо метода get можно использовать all, будет то же самое.
для выборки нескольких полей исп-ся select('collumName', collumName); пример: DB::table('tableName')->select('collumName', 'collumName')->get();

для объеденения двух таблиц исп-ся команда joion('tableName', 'firstOperator', '=', 'secondOperator')

для изменения исп-ся метод update([]), где в массиве передаём параметры что необходимо изменить.
пример: DB:table('tableName')->where('id', 2)->update(['title'=> 'new title']);

для удаления используется метод delete(); пример: DB:table('tableName')->where('id', 2)->delete();

**_ORM eloquent _**

ORM(object-relation Mappimg) - техгология программирования, которая связывает БД с концепциями ооп, создовая виртуальную объектную бдшку.
генерация моделей php artisan make:model Name; так же можно генерировать модели сразу с фабрикой, сидами, контроллерами, для этого необходимо добавить флаг с нужной буквой
например для генирации со всем сразу можно исп-ть php artisan make:model Name -mfsc; m-миграция, f- фабрика, s- сид , c- контроллер.

вся работа строиться на моделях представлений в базе. В модели описывается структура базы, исходя из миграции. Всегда стоит сопостовлять модель, с тем
что было задано в миграции. 

***Работа с api***

создание контроллера для api - php artisan make:controller Name --api

для того чтобы данные возвращались только с необходимыми полями создаётся механизм resourse;
php artisan make:resource NameResource

