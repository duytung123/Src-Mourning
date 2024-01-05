(() => {
    window.addEventListener( 'load', () => {
        // Edit by IVS 2023/12/25
        // set  本人 is disable
        var selectPass = document.querySelector('select[id="passed_away_relationship"] option[value="1"]');
        if(selectPass) {
            selectPass.disabled = true;
        }

        // Check value of wake and Funeral , if both are disabled then hidden 弔問・供花・弔電について
        document.addEventListener('input',(e)=>{
            var valWake= document.querySelector('input[name="wake"]:checked').value;
            var valFuneral= document.querySelector('input[name="funeral"]:checked').value;
            var valClass = document.getElementById("classification").value;
            var valRelationship = document.getElementById("passed_away_relationship").value;
            var valEntrant= document.querySelector('input[name="entrant"]:checked').value;

            if(e.target.getAttribute('name') == "wake"){
                var valWake = e.target.value
            }
            if(e.target.getAttribute('name') == "funeral"){
                var valFuneral = e.target.value
            }
            if(e.target.getAttribute('name') == "chief_mourner"){
                var valChiefMourner= document.querySelector('input[name="chief_mourner"]:checked').value;
                var valChiefMourner = e.target.value
            }
            if(e.target.getAttribute('name') == "entrant"){
                var valEntrant = e.target.value
            }
            if( (valWake === '1' && valFuneral === '1') || (valEntrant ==='0' && valClass === '8') || (valEntrant ==='1' && valClass === '8' && valRelationship != '1')  || (valEntrant === '0' && valRelationship === '7') || (valRelationship === '7' && valChiefMourner === '0') || (valRelationship === '7' && valChiefMourner === '1')){
                $('#section-others').addClass('toggle-body')
                $('#section-others').removeClass('active')
            }else{
                $('#section-others').addClass('active')
            }
            // toggle for  本人(弔事当事者)との続柄
            if (valEntrant === '1') {
                document.querySelector('select[id="passed_away_relationship"] option[value="1"]').disabled = false;
            }
            else{
                document.querySelector('select[id="passed_away_relationship"] option[value="1"]').disabled = true;
                if(valRelationship === '1'){
                    $("#passed_away_relationship").val('')
                }
            }
        });

        // End Edit by IVS 2023/12/25

        // 全角カタカナに変換
        function hiraToKana(str) {
            return str.replace(/[\u3041-\u3096]/g, (match) => {
                const chr = match.charCodeAt(0) + 0x60;
                return String.fromCharCode(chr);
            });
        }

        // 全角カタカナに変換実行
        try {
            $('.hira2kana').each(function () {
                $(this).on("blur", function () {
                    const str = hiraToKana($(this).val());
                    $(this).val(str);
                });
            });
        } catch (e) {
            console.info(e)
        }

        // 半角英数に変換
        function zen2half(str) {
            return str.replace(/[Ａ-Ｚａ-ｚ０-９！-～]/g, (s) => {
                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            });
        }

        // 半角英数に変換実行
        try {
            $('.zen2half').each(function () {
                $(this).on("blur", function () {
                    const str = zen2half($(this).val());
                    $(this).val(str);
                });
            });
        } catch (e) {
            console.info(e)
        }

        // 全角に変換
        function half2zen(str) {
            return str.replace(/[!-~]/g,
                (s) => {
                    return String.fromCharCode(s.charCodeAt(0) + 0xFEE0);
                }
            );
        }

        // 半角→全角
        try {
            $('.half2zen').each(function () {
                $(this).on("blur", function () {
                    const str = half2zen($(this).val());
                    $(this).val(str);
                });
            });
        } catch (e) {
            console.info(e)
        }

        // urlのプロトコル追加
        try{
            const tgts = document.querySelectorAll('input[type="url"]');
            tgts.forEach( (el) =>{
                el.addEventListener('change',(ev)=>{
                    let url = ev.target.value;
                    let linkId = ev.target.id;
                    let linkBlock = document.getElementById( linkId + '_check')
                    let link = linkBlock.querySelector('a');
                    if(ev.target.value.search(/^http/) < 0 && url){
                        url = 'https://' + url;
                        ev.target.value = url;
                    }
                    if(!url){
                        linkBlock.style.display = 'none';
                        link.setAttribute('href', '')
                    } else {
                        linkBlock.style.display = 'block';
                        link.setAttribute('href', url)
                    }
                })
            })
        } catch (e) {
            console.info(e)
        }

        // 郵便番号のハイフン削除
        try {
          const zip = document.querySelectorAll('input.zip');
          if (zip.length < 1) return false;
          zip.forEach((input) => {
            input.addEventListener('change', (e) => {
              let str = e.target.value;
              str = str.replace(/[^0-9０-９]/g, '');
              e.target.value = str.substring(0,3)+'-'+str.substring(3);
              // e.target.value = str;
            });
          });
        } catch (e) {
          console.info(e)
        }

        // 情報のクッキー保存
        let pathname = location.pathname;
        let tgt_pwd = document.getElementById('passwd'),
            tgt_id = document.getElementById('employee_no');
        try {
            if (pathname.indexOf('/finished') > 0) {
                const pwd = document.getElementById('js_pwd').dataset.pwd;
                const id = document.getElementById('js_id').dataset.id;
                Cookies.set('pwd', pwd, {expires: 30, secure: true});
                Cookies.set('id', id, {expires: 30, secure: true});
            }
        } catch (e) {
            console.info("Cannot set cookie");
        }
        try {
            if (tgt_pwd) {
                const pwd = Cookies.get('pwd');
                const id = Cookies.get('id');
                document.querySelector('label[for="passwd"]').classList.add('active');
                document.querySelector('label[for="employee_no"]').classList.add('active');
                // label.classList.add('active');
                tgt_pwd.setAttribute('value', pwd);
                tgt_id.setAttribute('value', id);
            }
        } catch (e) {
            console.info("Cannot get cookie");
        }

        // ラジオによるトグル表示
        try {
            let toggles = document.querySelectorAll('.is-toggle');
            const set_required = (el, bool) => {
                if (bool) {
                    el.setAttribute('required', '');
                    el.removeAttribute('disabled');
                } else {
                    el.removeAttribute('required');
                    el.setAttribute('disabled','')
                }
            }
            toggles.forEach(el => {
                const tgt = el.dataset.tgt,
                    state = el.dataset.state;
                let content = document.getElementById(tgt);
                const validate = content.querySelectorAll('.required');
                // console.log(validate);
                const init = (el)=>{
                    const checked = el.getAttribute('checked')
                    if(state === "true" && checked === ''){
                        validate.forEach(el_required => {
                            set_required(el_required, false)
                            if(el_required.getAttribute('type') === 'hidden'){
                                let picker = el_required.nextElementSibling;
                                set_required(picker, true)
                            }
                        })
                    } else {
                        validate.forEach(el_required => {
                            set_required(el_required, true)
                            if(el_required.getAttribute('type') === 'hidden'){
                                let picker = el_required.nextElementSibling;
                                set_required(picker, false)
                            }
                        })
                    }
                }
                // init(el);
                const toggleView = (el) => {
                    try {
                        if (state === 'true') {
                            content.classList.add('active');
                            validate.forEach(el_required => {
                                set_required(el_required, true)
                                if(el_required.getAttribute('type') === 'hidden'){
                                    let picker = el_required.nextElementSibling;
                                    set_required(picker, true)
                                }
                            })
                        } else {
                            content.classList.remove('active')
                            validate.forEach(el_required => {
                                set_required(el_required, false)
                                if(el_required.getAttribute('type') === 'hidden'){
                                    let picker = el_required.nextElementSibling;
                                    set_required(picker, false)
                                }
                            })
                        }
                    } catch (e) {
                        console.info(e)
                    }
                }
                el.addEventListener('click', (ev) => {
                    toggleView(el);
                });

            })

            // const form_selects = document.querySelectorAll('select.required');
            // form_selects.forEach(el => {
            //     // el.style.display = 'inline';
            //     // el.style.height = 0;
            //     // el.style.width = 0;
            //     // el.style.padding = 0;
            //     // el.style.position = 'absolute';
            //     // el.style.zIndex = '-1';
            //     // el.style.left = '50%';
            // });

        } catch (e){
            // console.info(e)
        }
    });

    // materializecss initialization
    M.AutoInit();

    const selectManager = document.getElementById('js-select-manager');
    const openContents = function (id) {
        const tgt = document.querySelectorAll('#js-manager-content li.section');
        let i = 1;
        tgt.forEach(el => {
            if (Number(id) === i) {
                el.classList.add('active');
                el.querySelector('.collapsible-body').style.display = 'block';
            } else {
                el.classList.remove('active');
                el.querySelector('.collapsible-body').style.display = 'none';
            }
            i++;
        });
    }
    if (selectManager) {
        const links = selectManager.querySelectorAll('a');

        links.forEach(el => {
            const number = el.getAttribute('href').replace('#anc', '');
            el.addEventListener('click', function (ev, n = number) {
                openContents(n);
            })
        });
    }

    // 参列者追加による弔電の処理
    const attend = document.querySelectorAll('input.js-attend');
    if (attend) {
        attend.forEach(el => {
            el.addEventListener('change', () => {
                const val = el.dataset.val;
                const id = "js_" + el.getAttribute('name');
                const tgt = el.dataset.tgt;
                if(document.getElementById(id)){
                    // Edit by IVS 2023/12/01
                    if(val == '0'){
                        document.getElementById(id).innerHTML = `<i class='material-icons'>remove</i>`;
                    }else{
                        document.getElementById(id).innerHTML = val;
                    }
                    // End edit by IVS IVS 2023/12/01
                }
                document.getElementById("company_telegram" + tgt).setAttribute('value', val)
            });
        })
    }


    //祝日一覧をAPIから取得する
    function fetchHolidays(type) {
        const today = new Date();
        const year  = today.getFullYear();
        const nextYear  = year + 1;
        const prevYear  = year - 1;
        if(type === 0) {
            return holiday = fetch(`https://holidays-jp.github.io/api/v1/${year}/date.json`)
                .then((res) => {
                    if (!res.ok) {
                        throw new Error(`${res.status} ${res.statusText}`);
                    }
                    return res.json();
                })
                .then((json) => {
                    return json;
                })
                .catch((reason) => {
                    console.error(reason);
                });
        } else if(type === 1) {
            return holidayNext = fetch(`https://holidays-jp.github.io/api/v1/${nextYear}/date.json`)
                .then((res) => {
                    if (!res.ok) {
                        throw new Error(`${res.status} ${res.statusText}`);
                    }
                    return res.json();
                })
                .then((json) => {
                    return json;
                })
                .catch((reason) => {
                    console.error(reason);
                });
        }else if(type === 2) {
            return holidayPrev = fetch(`https://holidays-jp.github.io/api/v1/${prevYear}/date.json`)
                .then((res) => {
                    if (!res.ok) {
                        throw new Error(`${res.status} ${res.statusText}`);
                    }
                    return res.json();
                })
                .then((json) => {
                    return json;
                })
                .catch((reason) => {
                    console.error(reason);
                });
        }
    }

    //日付をフォーマット YYYY-MM-DD
    function formatDate(date) {
        const year  = date.getFullYear();
        const month = date.getMonth() + 1;
        const mm    = ('00' + month).slice(-2);
        const day   = date.getDate();
        const dd    = ('00' + day).slice(-2);
        return `${year}-${mm}-${dd}`;
    }

    //祝日の場合にクラスをつける
    function addHolidayClass(dayElem, holidays){
        const date      = dayElem.dateObj;
        const selectDay = formatDate(date);
        if(selectDay in holidays){
            dayElem.classList.add('is-holiday');
        }
    }


    // date time picker
    async function flatpickrInit(){
        const holidays0 = await fetchHolidays(0);
        const holidays1 = await fetchHolidays(1);
        const holidays2 = await fetchHolidays(2);
        const holidays = Object.assign(holidays2, holidays0, holidays1);

        const d = document.querySelector('input[type="date"]')
        if(d){
            // date picker
            flatpickr('input[type="date"]', {
                locale: "ja",
                altFormat: "Y年n月j日（D）",
                altInput: true,
                allowInput: true,
                ariaDateFormat: "Y-m-d",
                onDayCreate : (dObj, dStr, fp, dayElem) => {
                    addHolidayClass(dayElem,holidays);
                }
            })

        }

        const t = document.querySelector('input[type="time"]')
        if(t){
            // time picker
            flatpickr('input[type="time"]', {
                enableTime: true,
                noCalendar: true,
                allowInput: true,
                dateFormat: "H:i",
                time_24hr   : true, //24時間表記
            })
        }
        const dtl = document.querySelector('input[type="datetime-local"]')
        if(dtl){
            // date time picker
            let picker = flatpickr('input[type="datetime-local"]', {
                enableTime: true,
                altInput: true,
                altFormat: "Y年n月j日（D）H:i",
                ariaDateFormat: "Y-m-d H:i",
                allowInput: true,
                defaultDay: new Date(),
                defaultHour: new Date().getHours(),
                defaultMinute: new Date().getMinutes(),
                locale: "ja",
            })

            // 受付現在時刻設定
            const reception = document.getElementById('reception');
            if (reception) {
                // 初期設定
                let check = setTimeout(()=>{
                    const defaultState =reception.checked;
                    if(defaultState){
                        picker.setDate(new Date(), false, "Y-m-d H:i")
                    } else {
                        picker.clear()
                        document.getElementById('reception').removeAttribute('checked')
                    }
                },800)
                reception.addEventListener('click', function (ev) {
                    const state = reception.checked;
                    if (state) {
                        picker.setDate(new Date(), false, "Y-m-d H:i")
                    } else {
                        picker.clear()
                    }
                })
            }
        }
    }
    flatpickrInit().then(r => {
        let dropdown = document.querySelectorAll('select.flatpickr-monthDropdown-months')
        if(dropdown){
            dropdown.forEach((el)=>{
                el.classList.add('browser-default')
            })
        }
    });

    // 通夜を行わず、告別式を行う場合は住所必須
    const tgtWake = document.querySelectorAll('input[name=wake]');
    if(tgtWake){
        tgtWake.forEach((el)=>{
            el.addEventListener('click', (ev)=>{
                if(ev.target.value === '1'){
                    // 通夜を行うときの処理
                    const ceremonies = document.querySelectorAll('input[name=funeral_same_ceremony]')
                    ceremonies.forEach((ceremony)=>{
                        if(ceremony.value === '1'){
                            // 通夜と同じ式場ラジオボタン操作
                            ceremony.checked = true;
                            // ceremony.setAttribute('checked','')
                        } else {
                            // 通夜と同じ式場ラジオボタン操作
                            // ceremony.removeAttribute('checked')
                            ceremony.checked = false;
                            // 取り消し線追加
                            ceremony.setAttribute('disabled','')
                            ceremony.nextElementSibling.style.textDecoration = 'line-through';
                        }
                    })
                    // 非表示項目表示
                    const active = document.getElementById('js_funeral_same_ceremony');
                    active.classList.add('active')

                    // 非表示項目内の必須項目対応
                    const requires = active.querySelectorAll('.required')
                    requires.forEach((req)=>{
                        req.setAttribute('required','')
                    })
                } else {
                    const ceremonies = document.querySelectorAll('input[name=funeral_same_ceremony]')
                    ceremonies.forEach((ceremony)=>{
                        if(ceremony.value === '1'){
                            // 通夜と同じ式場ラジオボタン操作
                            // ceremony.setAttribute('checked','checked')
                        } else {
                            // 通夜と同じ式場ラジオボタン操作
                            // ceremony.removeAttribute('checked')
                            // 取り消し線削除
                            ceremony.removeAttribute('disabled')
                            ceremony.nextElementSibling.style.textDecoration = 'none';
                        }
                    })
                }
            })
        })

    }


    // 喪主のの設定。本人が逝去した場合、喪主は本人以外に設定
    const point = document.getElementById('passed_away_relationship');
    if(point){
        let tgt0 = document.getElementById('chief_mourner0'),
            tgt1 = document.getElementById('chief_mourner1'),
            tgt2 = document.getElementById('js_chief_mourner');

        // 喪主のの設定。本人が逝去した場合、喪主は本人以外に設定
        point.addEventListener('change', ()=>{
            if(point.value === '1'){
                tgt0.disabled = true;
                tgt0.classList.add('disabled')
                tgt1.checked = true;
                tgt2.classList.add('active')
                try{
                    document.getElementById('chief_mourner_name').setAttribute('required','')
                    document.getElementById('chief_mourner_kana').setAttribute('required','')
                    document.getElementById('chief_mourner_relationship').setAttribute('required','')
                } catch (e) {
                    console.info(e);
                }

            } else if(point.value === '7'){
                try{
                    document.querySelector('[name=fax_posting][value="1"]').checked = true;
                } catch (e) {
                    console.info(e);
                }

            } else {
                tgt0.disabled = false;
                tgt0.classList.remove('disabled')

                // tgt1.checked = false;
                // tgt2.classList.remove('active')
            }
        });

    }

    // 通夜、告別式を行わない場合、供花、弔電が辞退できないようにする
    const jsWake = document.querySelectorAll('input[name=wake]');
    const jsFuneral = document.querySelectorAll('input[name=funeral]');
    const wakeState = ()=>{
        const wakeSelected = document.querySelector('input[name=wake]:checked')
        return wakeSelected.value;
    }
    const funeralState = ()=>{
        const funeralSelected = document.querySelector('input[name=funeral]:checked')
        return funeralSelected.value;
    }
    // Edit by IVS 2023/28/13
    // const refusal = (type)=>{
    //     const isFloral = document.querySelector('input[name=floral_tribute][value="2"]'),
    //         isTelegram = document.querySelector('input[name=telegram][value="2"]');
    //     if(type){
    //         isFloral.checked = false;
    //         isTelegram.checked = false;
    //         isFloral.setAttribute('disabled','')
    //         isTelegram.setAttribute('disabled','')
    //     } else {
    //         isFloral.removeAttribute('disabled')
    //         isTelegram.removeAttribute('disabled')
    //     }
    // }
    // End Edit by IVS 2023/28/13
    if(jsWake && jsFuneral){
        jsWake.forEach((el)=>{
            el.addEventListener('change',(ev)=>{
                if(+wakeState() === 1 && +funeralState() === 1){
                    refusal(true)
                } else {
                    refusal(false)
                }
            })
        });
        jsFuneral.forEach((el)=>{
            el.addEventListener('change',(ev)=>{
                if(+wakeState() === 1 && +funeralState() === 1){
                    refusal(true)
                } else {
                    refusal(false)
                }
            })
        })

    }




    // select の invalid 対応
    const selects = document.querySelectorAll('select')
    function logVal(e){
        // alert(e.target.id);
        e.target.classList.add('invalid')
    }
    selects.forEach((elm)=>{
        elm.addEventListener('invalid', logVal)
    });

    // アコーディオンオープン時の設定保存
    const accordionItems = document.querySelectorAll('.collapsible-header');
    if(accordionItems){
        accordionItems.forEach( el=>{
            el.addEventListener('click', (ev)=>{
                document.getElementById('accordion-state').value = ev.target.parentNode.dataset.type;
            })
        })
    }
    // page load 時のアコーディオンデフォルト設定
    const accordionState = document.getElementById('accordion-state');
    if(accordionState){
        const id =  accordionState.value ? accordionState.value : '1';
        const accordions = document.querySelectorAll('.collapsible .section');
        accordions.forEach(el=>{
            el.classList.remove('active');
        })
        const tgt = document.querySelector('[data-type="'+id+'"]');
        console.log();
        tgt.classList.add('active');
        tgt.querySelector('.collapsible-body').style.display = 'block';

    }


    // GM, 役員の上司入力確認
    const classification_check = document.getElementById('js_classification_check');
    if(classification_check){
        const select = document.getElementById('classification');
        const req = document.querySelector('#js_classification_check .required');
        if(select.value == 5 || select.value == 6){
            classification_check.style.display = 'block'
        }
        select.addEventListener('change',(ev)=>{
            const classification = ev.currentTarget.value;
            if(classification == 6 || classification == 5){
                classification_check.style.display = 'block';
                req.setAttribute('required', '')

            } else {
                classification_check.style.display = 'none';
                req.removeAttribute('required')
            }
        })
    }

})()
