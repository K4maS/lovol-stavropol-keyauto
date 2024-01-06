<section class="attachments" id="attachments">
    <div class="container attachments__container">
        <div class="attachments__content">











        </div>
    </div>
</section>

<script>
    const startPage = `
        <div class="attachments__block attachments__block1 active">
                <div class="attachments__block-left">
                    <h2 class="title attachments__title">
                        Подобрать<br>
                        навесное обрудование
                    </h2>
                    <p class="attachments__descr">
                        Серия трактора
                    </p>
                    <div class="attachments__btn-block">
                        <button class="attachments__btn series" value='val2'>TE</button>
                        <button class="attachments__btn series" value='2'>TB</button>
                        <button class="attachments__btn series" value='2'>TH</button>
                    </div>

                </div>
            </div>
    `
    let models = {
        TE: ['LOVOL TЕ244 HT', 'LOVOL TЕ244', 'LOVOL TЕ354 HT', 'LOVOL TЕ354', 'LOVOL TЕ404 GII', 'LOVOL TЕ404 GIII', ],
        TB: ['LOVOL TB504 GIII', 'LOVOL TB604 GIII', 'LOVOL TB754 GIII', ],
        TH: ['LOVOL TH804 GIII', ]
    };

    let attachmentsType = {
        'all': ['Сельскохозяйственные', 'Коммунальные']
    }
    let attachmentsList = {
        'Сельскохозяйственные': ['Дисковая борона', 'Фреза почвенная', 'Косилка измельчитель легкая', 'Лемешный плуг', 'Косилка измельчитель тяжелая', 'Цеповой мульчер', 'Мульчер', 'Бур навесной', 'Измельчитель веток', ],
        'Коммунальные': ['Экскаватор-погрузчик', 'Погрузчик навесной фронтальный', 'Ковш', 'Ковш челюстной', 'Отвал к трактору универсальный гидроповоротный', 'Щеточное оборудование', ]
    }

    let attachmentDescrs = {
        'Дисковая борона': `Навесные дисковые бороны BQX с
        двухрядным расположением
        рабочих органов предназначены
        для:
        <br>- предпосевной подготовки почвы
        без предварительной вспашки,
        <br>- рыхления и подготовки почвы
        под посев`,
        'Фреза почвенная': `Навесная почвофреза
            предназначена для разрыхления и
            перемешивания слоев почвы без
            оборачивания. Фреза взламывает
            глыбы, подрезает стебли, позволяет
            быстро произвести окончательную
            подготовку полей после
            многолетних культур.`,
        'Косилка измельчитель легкая': `Косилки цеповые предназначены
            для скашивания и измельчения
            травы, сорняков и кустарников. 
            Косилки укомплектованы Y 
            ножами, которые удаляют густой
            бурьян, остатки многолетних трав, 
            ветки и подлесок с толщиной
            ствола до 2,5 см.`,
        'Лемешный плуг': `Плуг применяется для проведения
                пропашных задач`,
        'Косилка измельчитель тяжелая': `Косилка-измельчитель молотковая
            для тяжелых условий. Подходит
            для работы на траве в садах, 
            виноградниках, теплицах и парках.
            `,
        'Цеповой мульчер': `Тяжелый мульчирователь AGF с
            гидравлической направляющей
            рамой применяется для обработки
            обочин дорог, садов, парков с
            различным уклоном грунта. 
            Разработан для ухода за
            кустарниками, садами, обрезки
            деревьев и общей мульчировки`,
        'Мульчер': `Мульчер FKM – это мощная модель, 
                предназначенная для
                мульчирования и измельчения
                обрезки. Оснащен
                параллелограммной регулировкой
                бокового сдвига с большим
                диапазоном настроек`,
        'Бур навесной': `Бур навесной используется во
                многих сферах хозяйственной
                деятельности - для рытья ям, под
                посадку саженцев, установку
                столбов, опор и прочих
                устанавливаемых и крепящихся в
                земле вертикальных конструкций.`,
        'Измельчитель веток': `Коммунальный измельчитель веток. Применяется для
                утилизации порубочных остатков, древесных отходов, 
                веток деревьев, для производства щепы , арболита. 
                Ручная и гидравлическая система подачи веток.`,
        'Экскаватор-погрузчик': `Подходит для всех моделей`,
        'Погрузчик навесной фронтальный': `Погрузчики подходят для челюстной
                выполнения любых видов
                погрузочно-разгрузочных
                работ с массой груза от 300 до
                2000 кг, агрегатируются с
                тракторами тягового класса от
                0,6 до 3`,
        'Ковш': `Ковш используется для работы с 
                фронтальным погрузчиком`,
        'Ковш челюстной': `Ковш используется для работы с 
                    фронтальным погрузчиком`,
        'Отвал к трактору универсальный гидроповоротный': `Универсальный отвал имеет
            две рабочие поверхности: 
            одна с резиновыми ножами, 
            другая с металлическими
            ножами, при необходимости
            лопату можно перевернуть.`,
        'Щеточное оборудование': `Подходит для всех моделей`,
    }

    const reuseblePage = (currentName, names, descr, additionalClass = '') => {
        let namesBtn = '';
        names[currentName].forEach((elem) => {
            console.log(elem)
            namesBtn = namesBtn + `
            <button class="attachments__btn">${elem}</button>`
        });

        return `
            <div class="attachments__block attachments__block2 ${additionalClass} active">
                <h2 class="title attachments__title">
                    Подобрать
                    навесное обрудование
                </h2>
                <p class="attachments__descr">
                    ${descr}
                </p>
                <div class="attachments__btn-block"> 
                    ${namesBtn}
                </div>
            </div>`
    }

    const finalPage = (attachment, model, descr = '') => {

        return `
            
        <div class="attachments__block attachments__block2 active">
                <h2 class="title attachments__title">
                    Подобрать
                    навесное обрудование
                </h2>
                <p class="attachments__descr">
                    ${attachment} для трактора ${model}
                </p>

                <p class="attachments__descr2">
                   ${descr}
                </p>
                <div class="attachments__form">
                    <form action="mail.php" method="POST" class="all_forms">
                        <input name="title" type="hidden" value="${attachment} для трактора ${model}">
                        <input name="comment" type="hidden" value="">
                        <input name="form_name" type="hidden" value="">
                        <input name="form_type_model_name" type="hidden" value="">
                        <input name="form_diler" type="hidden" value="">

                        <div class="form-group attachments__form-group">
                            <input type="tel" name="phone" class="input nacc form-control" placeholder="Ваш номер телефона">

                            <button type="submit" class="form-control btn"><span>Заказать звонок</span></button>

                            <label class="agree_field attachments__agree_field"><input type="checkbox" name="agree" value="1" checked="checked"><span class="inp_cust"></span>Я согласен с <a target="_blank" href="./policy.php">условиями
                                    обработки персональных данных</a></label>
                        </div>
                    </form>
                </div>
            </div>`
    }


    $(function() {
        let series = '';
        let model = '';
        let attachmentType = ''
        let attachment = ''
        let step = 0;

        $('.attachments__content').html(startPage);
        $('.attachments__btn').each(function(index, elem) {
            // Выбор серии
            $(elem).click(function(e) {
                step = step + 1;
                series = e.target.innerText;
                console.log(series);
                $('.attachments__content').html(reuseblePage(series, models, 'Выберите модель трактора'));
                windowRender();
            })
        })


        function windowRender() {
            if (step == 1) {
                $('.attachments__btn').each(function(index, elem) {
                    // Выбор модели
                    $(elem).click(function(e) {
                        step = step + 1;
                        model = e.target.innerText;
                        console.log(model);
                        $('.attachments__content').html(reuseblePage('all', attachmentsType, 'Выберите тип навесного оборудования', 'attachments-type'));
                        windowRender();
                    })
                })
            } else if (step == 2) {
                $('.attachments__btn').each(function(index, elem) {
                    $(elem).click(function(e) {
                        step = step + 1;
                        attachmentType = e.target.innerText;
                        console.log(attachmentType);
                        let descr = `${attachmentType} навесное оборудование для трактора  ${model}`
                        $('.attachments__content').html(reuseblePage(attachmentType, attachmentsList, descr));
                        windowRender();
                    })
                })
            } else if (step == 3) {
                $('.attachments__btn').each(function(index, elem) {
                    $(elem).click(function(e) {
                        step = step + 1;
                        attachment = e.target.innerText;
                        console.log(attachmentType);
                        $('.attachments__content').html(finalPage(attachment, model, attachmentDescrs[attachment]));
                    })
                })
            }

            console.log(step)
        }
    });
</script>