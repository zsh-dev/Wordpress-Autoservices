// Получаем кнопку
const burgerButton = document.querySelector('.burger'),
        menuCloseBtn = document.querySelector('.close-menu-btn'),
        menuMain = document.querySelector('.header-menu-inner');
// Добавляем обработчик события
burgerButton.addEventListener('click', () => {
  // Добавляем/убираем класс active
  menuMain.classList.toggle('active');
  document.body.classList.toggle('lock');
});
menuCloseBtn.addEventListener('click', () => {
  // Добавляем/убираем класс active
  menuMain.classList.remove('active');
  document.body.classList.remove('lock');
});

const servicesSlider = new Swiper('.services-slider', {

  spaceBetween: 30,
  loop: true,
  speed: 800, // Скорость анимации
  navigation: {
      nextEl: '.services-slider-next',
      prevEl: '.services-slider-prev',
  },
  // Эффект перехода
  effect: 'slide',
  // Плавность прокрутки
  grabCursor: true,
  breakpoints: {
      320: {
          slidesPerView: 1.5,
          spaceBetween: 20
      },
      768: {
          slidesPerView: 2.5,
          spaceBetween: 25
      },
      1199: {
          slidesPerView: 3.5,
          spaceBetween: 30
      }
  }
});

const feedbacksswiper = new Swiper('.feedbacks-slider', {
    navigation: {
        nextEl: '.feedbacks-slider-btn-next',
        prevEl: '.feedbacks-slider-btn-prev',
    },
    loop: true,
    autoHeight: true,
    slidesPerView: 1,
    spaceBetween: 40,
});



function maskPhone(selector, masked = '+7 (___) ___-__-__') {
    const elems = document.querySelectorAll(selector);
  
    function mask(event) {
      const keyCode = event.keyCode;
      const template = masked,
        def = template.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, "");
      console.log(template);
      let i = 0,
        newValue = template.replace(/[_\d]/g, function (a) {
          return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
        });
      i = newValue.indexOf("_");
      if (i !== -1) {
        newValue = newValue.slice(0, i);
      }
      let reg = template.substr(0, this.value.length).replace(/_+/g,
        function (a) {
          return "\\d{1," + a.length + "}";
        }).replace(/[+()]/g, "\\$&");
      reg = new RegExp("^" + reg + "$");
      if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
        this.value = newValue;
      }
      if (event.type === "blur" && this.value.length < 5) {
        this.value = "";
      }
  
    }
  
    for (const elem of elems) {
      elem.addEventListener("input", mask);
      elem.addEventListener("focus", mask);
      elem.addEventListener("blur", mask);
    }
  
  }
  maskPhone('.phone-input', '+7 (___) ___-__-__');


 // Получаем все элементы списка FAQ
const faqItems = document.querySelectorAll('.faq-item');

// Перебираем все элементы
faqItems.forEach(function (item, index) {
  const question = item.querySelector('.faq-item__question'); // Заголовок с кнопкой
  const answer = item.querySelector('.faq-item__answer'); // Ответ

  if (index === 0) {
    // Открываем первый элемент
    answer.style.maxHeight = answer.scrollHeight + "px";
    item.classList.add('open');
  } else {
    // Скрываем остальные
    answer.style.maxHeight = "0";
  }

  // Навешиваем обработчик клика на заголовок
  question.addEventListener('click', function () {
    const isOpen = item.classList.contains('open');

    // Закрываем все ответы
    faqItems.forEach(function (otherItem) {
      const otherAnswer = otherItem.querySelector('.faq-item__answer');
      otherAnswer.style.maxHeight = "0";
      otherItem.classList.remove('open');
    });

    // Если текущий не был открыт, открываем его
    if (!isOpen) {
      answer.style.maxHeight = answer.scrollHeight + "px";
      item.classList.add('open');
    }
  });
});


// ТАБЫ
const tabs = document.querySelectorAll('.tabs-btn');
const tabBlocks = document.querySelectorAll('.tabs-content');

// Убедимся, что у нас есть хотя бы один таб
if (tabs.length > 0 && tabBlocks.length > 0) {
  // Устанавливаем первый таб и его содержимое активными по умолчанию
  tabs[0].classList.add('active');
  tabBlocks[0].classList.add('active');

  // Добавляем обработчик событий для всех табов
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      // Удаляем класс active со всех табов и блоков
      tabs.forEach(t => t.classList.remove('active'));
      tabBlocks.forEach(block => block.classList.remove('active'));

      // Добавляем active на текущий таб и связанный блок
      tab.classList.add('active');
      const target = document.querySelector(tab.getAttribute('data-tab'));
      target.classList.add('active');
    });
  });
}

// МОДАЛКА
const modalOverlay = document.getElementById('modalOverlay');
const openModalBtn = document.querySelectorAll('.openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');

// Открытие модалки
openModalBtn.forEach(element => {
  element.addEventListener('click', () => {
    modalOverlay.classList.add('active');
    document.body.classList.add('lock');
});
});



// Закрытие модалки по кнопке
closeModalBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('active');
    document.body.classList.remove('lock');
});

// Закрытие модалки при клике на оверлей
modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
        document.body.classList.remove('lock');
    }
});

// Закрытие модалки по клавише Esc
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        modalOverlay.classList.remove('active');
        document.body.classList.remove('lock');
    }
});

// Анимация счетчика
const counterElements = document.querySelectorAll('.counter-block__number');
    
function animateValue(element, start, end, duration) {
    const symbol = element.querySelector('.counter-block__number-symbol');
    const symbolText = symbol ? symbol.outerHTML : '';
    
    let startTimestamp = null;
    
    function step(timestamp) {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        element.innerHTML = current + symbolText;
        
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    }
    
    window.requestAnimationFrame(step);
}

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const element = entry.target;
            const endValue = parseInt(element.textContent);
            animateValue(element, 0, endValue, 2000); // 2000ms = 2 секунды
            observer.unobserve(element);
        }
    });
}, {
    threshold: 0.1
});

counterElements.forEach(counter => {
    observer.observe(counter);
});