(() => {
    window.addEventListener('load',(ev) => {

        // 状態の変更
        const $tgt = document.getElementById('dropdown1');
        if($tgt){
            $items = $tgt.querySelectorAll('a');
            $items.forEach(el=>{
                el.addEventListener('click',(e)=>{
                    e.preventDefault();
                    const val = e.target.dataset.value;
                    const id = e.target.dataset.id;
                    const res = confirm('ステイタスを変更してもいいですか？')
                    if( res === true)
                    {
                        let path= location.pathname;
                        path = path.split('/admin/')
                        const url = path[0]+'/admin/status/'+id+'/'+val;

                        fetch(url, {
                            method: "POST",
                        })
                            .then( response => response.text())
                            .then(text=>{
                                if(text){
                                    document.getElementById('js-status-str').innerHTML = $STATUS_ARRAY[val];
                                    location.reload();
                                }
                            })

                    }
                })
            })
        }

        // 確認状況変更
        const checkers = document.querySelectorAll('.js-checker');
        if(checkers){
            checkers.forEach((el)=>{
                el.addEventListener('change', (e)=>{
                    const num = (e.target.checked) ? 1 : 0;
                    const name = e.target.name;
                    const id = e.target.dataset.id;
                    const res = confirm('確認状況を変更してもいいですか？')
                    if( res === true)
                    {
                        let path= location.pathname;
                        path = path.split('/admin/')
                        const url = path[0]+'/admin/check/'+id+'/'+name+'/'+num;

                        fetch(url, {
                            method: "GET",
                        })
                            .then( response => {
                                if(!response.ok){
                                    let c = e.target.checked;
                                    e.target.checked = !c;
                                    console.error('サーバーエラー');
                                } else {
                                    location.reload();
                                }
                            })
                            .catch(error=>{
                                let c = e.target.checked;
                                e.target.checked = !c;
                                console.error('通信に失敗しました', error);
                            })

                    } else {
                        let c = e.target.checked;
                        e.target.checked = !c;
                    }
                })
            })
        }

        // 検索
        const $search = document.getElementById('search-card');
        if($search){
            const reset = $search.querySelector('button[type=reset]')
            reset.addEventListener('click', (ev)=>{
                const input = $search.querySelectorAll('input[type=text]');
                input.forEach((el)=>{
                    el.setAttribute('value','')
                })
                const select = $search.querySelectorAll('select');
                select.forEach((sel)=>{
                    sel.options[0].selected = true;
                })

            });
        }

        // 編集切替
        const editButtonsArea = document.getElementById('edit-buttons');
        if(editButtonsArea){
            const edit = document.getElementById('edit-regulation-edit');
            const cancel = document.getElementById('edit-regulation-cancel');
            const save = document.getElementById('edit-regulation-save');
            const tgt = document.querySelectorAll('#provisions input')

            edit.addEventListener('click', (ev)=>{
                // button toggle
                edit.classList.toggle('active');
                cancel.classList.toggle('active');
                save.classList.toggle('active');
                tgt.forEach(el=>{
                    el.removeAttribute('disabled')
                })
            });
            cancel.addEventListener('click', (ev)=>{
                // button toggle
                edit.classList.toggle('active');
                cancel.classList.toggle('active');
                save.classList.toggle('active');
                try{
                    tgt.forEach(el=>{
                        el.setAttribute('disabled', true);
                        el.value = el.dataset.val;
                    })
                } catch (e) {
                    console.log(e)
                }
            });

            save.addEventListener('click', (ev)=>{
                const res = confirm('会社規定を変更してもいいですか？')
                if( res === true)
                {
                    document.forms["provisions"].submit();
                }
            });
        }
    });
})()
