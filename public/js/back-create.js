// (()=>{
//     window.addEventListener('load', (ev)=>{
//         // ブラウザバックで戻ってきたときの処理
//         // console.log(window.performance.getEntriesByType('navigation')[0].type)
//         try {
//             const setRequired = (tgt, flg)=>{
//                 const requiredItems = tgt.querySelectorAll('.required');
//                 requiredItems.forEach( (el)=>{
//                     if(flg){
//                         el.setAttribute('required','')
//                     } else {
//                         el.removeAttribute('required')
//                     }
//                 })
//             }
//             if(window.performance.getEntriesByType('navigation')[0].type === 'back_forward'){
//                 // 入力者が代理者のときの処理
//                 const checkEntrant = document.querySelector('input[type=radio][name=entrant]:checked');
//                 if(checkEntrant != null){
//                     if(checkEntrant.dataset['state'] === 'true'){
//                         // 表示対応
//                         let tgt = document.getElementById('js_entrant');
//                         tgt.classList.add('active');
//                         setRequired(tgt, true);
//                     } else {
//                         let tgt = document.getElementById('js_entrant');
//                         tgt.classList.remove('active');
//                         setRequired(tgt, false);
//                     }
//                 }
//                 // 社内親族のときの処理
//                 const checkInlaws = document.querySelector('input[type=radio][name=inlaws]:checked');
//                 if(checkInlaws != null){
//                     if(checkEntrant.dataset['state'] === 'true'){
//                         // 表示対応
//                         let tgt = document.getElementById('js_inlaws');
//                         tgt.classList.add('active');
//                         setRequired(tgt, true);
//                     } else {
//                         let tgt = document.getElementById('js_inlaws');
//                         tgt.classList.remove('active');
//                         setRequired(tgt, false);
//                     }
//                 }
//                 // 通夜を行行わない
//                 const checkWake = document.querySelector('input[type=radio][name=wake]:checked');
//                 if(checkWake != null){
//                     if(checkWake.dataset['state'] === 'false'){
//                         // 表示対応
//                         let tgt = document.getElementById('js_wake');
//                         tgt.classList.remove('active');
//                         setRequired(tgt, false);
//                     } else {
//                         let tgt = document.getElementById('js_wake');
//                         tgt.classList.add('active');
//                         setRequired(tgt, true);
//                     }
//                 }
//                 // 喪主が本人以外
//                 // の処理
//                 const checkChiefMourner = document.querySelector('input[type=radio][name=chief_mourner]:checked');
//                 if(checkChiefMourner != null){
//                     if(checkChiefMourner.dataset['state'] === 'true'){
//                         // 表示対応
//                         let tgt = document.getElementById('js_chief_mourner');
//                         tgt.classList.add('active');
//                         setRequired(tgt, true);
//                     } else {
//                         let tgt = document.getElementById('js_chief_mourner');
//                         tgt.classList.remove('active');
//                         setRequired(tgt, false);
//                     }
//                 }
//                 // 告別式を行うのときの処理
//                 const checkFuneral = document.querySelector('input[type=radio][name=funeral]:checked');
//                 if(checkFuneral != null){
//                     if(checkFuneral.dataset['state'] === 'false'){
//                         // 表示対応
//                         let tgt = document.getElementById('js_funeral');
//                         tgt.classList.remove('active');
//                         setRequired(tgt, false);
//                         const checkFuneralSameCeremony = document.querySelector('input[type=radio][name=funeral]:checked');
//                         if(checkFuneralSameCeremony != null) {
//                             if (checkFuneralSameCeremony.dataset['state'] === 'true') {
//                                 // 表示対応
//                                 let tgt = document.getElementById('js_funeral_same_ceremony');
//                                 tgt.classList.add('active');
//                                 setRequired(tgt, true);
//                             }
//                         }
//                     } else {
//                         const checkFuneralSameCeremony = document.querySelector('input[type=radio][name=funeral]:checked');
//                         if(checkFuneralSameCeremony != null) {
//                             if (checkFuneralSameCeremony.dataset['state'] === 'true') {
//                                 // 表示対応
//                                 let tgt = document.getElementById('js_funeral_same_ceremony');
//                                 tgt.classList.add('active');
//                                 setRequired(tgt, true);
//                             }
//                         }
//                     }
//                 }
//
//                 // 日付設定
//                 const checkDate = document.getElementById('passed_away_date');
//                 if(checkDate != null){
//                     const val = checkDate.getAttribute('value');
//                     checkDate.nextElementSibling.setAttribute('value', val)
//                     console.log(checkDate, val);
//                 }
//             }
//         } catch (e){
//             console.info(e)
//         }
//     });
// })()
