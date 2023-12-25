(()=>{
  /**
   * メニューバー のトグル表示
   */
  document.addEventListener('DOMContentLoaded',()=>{

    // 'navbar-burger' のエレメント取得
    const $navbarBurgers = Array.prototype.slice.call(
      document.querySelectorAll('.navbar-burger'),0
    );

    // クリックイベントの追加
    $navbarBurgers.forEach(el => {
      el.addEventListener('click', ()=>{

        // 'data-taarget'の値を取得
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // 'is-active' クラスのトグル
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active')
      })
    })
  })
})()

