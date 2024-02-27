<?php
//data $order_id, date, full name, delivery/!delivery
$pageTitle = 'Оценить работу интернет-магазина';
$breadcrumb_2_alt = 'Оценка';
$breadcrumb_2_alt_href = 'news';
?>




<div class="container-fluid mb-4" style="min-height: 1000px" id="rating">
    <div class="container bg-white mb-4 p-3">
        <h2 class="mt-3  your_impressions" style="font-weight: bold;color: rgb(195, 15, 40);font-family: Roboto; font-weight: 700; line-height: 24px;letter-spacing: 0%;line-height: 35px">Оцените работу интернет-магазина</h2>

        <div id="rating" class="paragraphs pt-3" style="color: rgb(0, 0, 0); font-family: Roboto;font-size: 20px;font-weight: 400;line-height: 24px;letter-spacing: 0%; ">
            <div class="">
                <p class="mb-0" style="color: rgb(0, 0, 0);font-family: Roboto;font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: 0%;line-height: 25px">
                        Поделитесь впечатлениями о работе нашего магазина.
                </p>
                <p class="mt-0" style="color: rgb(0, 0, 0);font-family: Roboto;font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: 0%; line-height: 25px">
                        Обратная связь с клиентами подсказывает нам, в каком направлении работать, чтобы улучшать наш сервис.
                </p>
            </div>
            <ol class="test" style="font-size: 16px">
                <li>
                    <p style="">Оцените работу магазина в целом</p>
                    <div class="p-2 ps-5  star-wrap" id=#rating>
                        <div v-for="i in 5" :key="i" class="star" :class="{'star_yellow' : i <= stars}" @click="setStars(i)">
                            <!-- <img width="40" height="40" src="/assets/img/rate-us/star-empty.png"> -->
                            
                            <svg width="40" height="40">
                                <use xlink:href="#star" />
                            </svg>
                        </div>
                    </div>
                    <div id="app">
                        <p>Rating component</p>
                        <star-rating></star-rating>
                        
                        <p>Rating component (with set value that <strong>can</strong> be changed)</p>
                        <star-rating value="5"></star-rating>
                        
                        <p>Rating component (with set value that <strong>can't</strong> be changed)</p>
                        <star-rating value="2" :disabled="true"></star-rating>
                    </div>
                </li>
                <li>
                    <p>Если вы столкнулись с проблемой, выберите нужное</p>
                    <div class="pl-4" name="checkbox-wrap">
                        
                        <div v-for="i in 5" :key="i"  v-for="checkboxText in checkboxTextResponse" >
                            <input type="checkbox" id="checkboxText{{i-1}}" value="{{ checkboxText[i-1] }}" v-model="checkboxTextResponse">
                            <label for="checkboxText{{i-1}}"> {{ checkboxText[i-1] }} </label>
                        </div>

                        <input type="checkbox" id="checkboxText1" value="Неудобный сайт" v-model="checkboxTextResponse">
                        <label for="checkboxText1"> {{ checkboxText[0] }} </label> <br />

                        <input type="checkbox" id="checkboxText2" value="Неудобный поисковик" v-model="checkboxTextResponse">
                        <label for="checkboxText2"> {{ checkboxText[1] }} </label> <br />

                        <input type="checkbox" id="checkboxText3" value="Некорректная консультация" v-model="checkboxTextResponse">
                        <label for="checkboxText3"> {{ checkboxText[2] }} </label> <br />

                        <input type="checkbox" id="checkboxText4" value="Не оперативная доставка" v-model="checkboxTextResponse">
                        <label for="checkboxText4"> {{ checkboxText[3] }} </label> <br />

                        <input type="checkbox" id="checkboxText5" value="Долгая выдача" v-model="checkboxTextResponse">
                        <label for="checkboxText5"> {{ checkboxText[4] }} </label> <br />
                    </div>
                </li>
                <li>
                    <p>Опишите проблему</p>
                    <div>
                        <textarea class="form-control"  @blur="event => editProblem(event, 'name')" rows="3" width="100%" name="text_problem" id="" class="col-12 col-sm-7"></textarea>
                    </div>
                </li>
                <li>
                    <p>Что бы Вы улучшили?</p>
                    <div>
                        <textarea class="form-control"  @blur="event => editImprove(event, 'name')" rows="3" width="100%" name="text_improve" id="" class="col-12 col-sm-7"></textarea>
                    </div>
                </li>
            </ol>
            <div class="btn_rate ml-3 ml-md-4 pl-md-2">
                <input class="btn_rate-us" type="submit" value="Оценить магазин" @click="thanksForRate.show = true">
                <!-- + отправка данных в cp2 -->
            </div>
        </div>
    </div>
   
</div>

<style scoped>
    .star-rating__star {
    display: inline-block;
    padding: 3px;
    vertical-align: middle;
    line-height: 1;
    font-size: 1.5em;
    color: #ABABAB;
    transition: color .2s ease-out;

    .star-rating__star:hover {
      cursor: pointer;
    }
    
    .star-rating__star .is-selected {
      color: #FFD700;
    }
    
    .star-rating__star .is-disabled:hover {
      cursor: default;
    }

.star-rating {

  }

  star-rating__checkbox {
    position: absolute;
    overflow: hidden;
    clip: rect(0 0 0 0);
    height: 1px; width: 1px;
    margin: -1px; padding: 0; border: 0;
  }
}
    
	.hidden-modal {
	    min-height: 0;
	    padding-left: 2.25rem;
	    max-height: 0;
	    overflow: hidden;
	    transition: all .25s ease-out;
	}
    .custom_checkbox{
        position: absolute;
        z-index: -1;
        opacity: 0;
    }
    .custom_checkbox+label{
        display: inline-flex;
        align-items: center;
        user-select: none;
    }
    .checkedCheckbox{
        background-color: green;
    }
    .custom_checkbox+label::before{
        content: '';
        display: inline-block;
        width: 1em;
        height: 1em;
        flex-shrink: 0;
        flex-grow: 0;
        border: 1px solid #616161;
        border-radius: 0.4em;
        margin-right: 0.5em;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 90% 90%;
    }
    .custom_checkbox:checked+label::before{
        border-color: #616161;
        background-color: #fff;
        background-image: url(https://ru.opensuse.org/images/4/4f/Icon-checked.png);
    }
    /* hover on checkbox */
    .custom_checkbox:not(:disabled):not(:checked)+label:hover::before {
        border-color: #d98698;
    }
    /* for the active state of the checkbox (when user clicks on it) */
    .custom_checkbox:not(:disabled):active+label::before {
        background-color: #b3d7ff;
        border-color: #b3d7ff;
    }
    /* for focused state */
    .custom_checkbox:focus+label::before {
        box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, 0.25);
    }
    /* for focused state && not checked */
    .custom_checkbox:focus:not(:checked)+label::before {
        border-color: #80bdff;
    }
    /* for disabled state */
    .custom_checkbox:disabled+label::before {
        background-color: #e9ecef;
    }

    .paragraphs li{
        margin-top: 20px;
    }
    .paragraphs textarea{
        width: 750px;
        height: 100px;
        border-radius: 0.4em;
        padding: 5px;
    }
    .btn_rate-us{
        color: rgb(255, 255, 255);
        font-family: 'Roboto';
        font-size: 16px;
        font-weight: 700;
        text-align: center;
        padding: 15px 30px 15px 30px;
        background-color: #C30F28;
        border: none;
    }


    .star-wrap {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .star {
        color: #D9D9D9;
    }
    .star_yellow {
        color: #FDCA00;
    }

    .your_impressions{
        font-size: 36px;
        line-height: 40px;
    }

    .news__item-wrap {
        max-width: 1440px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        padding: 0 24px;
        
    }
    .news__item {
        display: flex;
        flex-direction: column;
        width: 100%;
        border: 1px solid #eee;
        padding: 16px;
    }
    .news__item-image {
        width: 100%;
        height: 300px;
    }
    .news__item-image > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .news__item-bottom {
        flex-grow: 1;
        font-weight: 600;
        padding: 16px 0 0 0;
        font-size: 14px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .news__item-date {
        margin: 30px 0 0 0;
        color: #bbb;
        font-size: 12px;
    }
    ol{
        padding-left: 2em; 
    }
    @media screen and (max-width: 1199px) {
        .news__item {
            width: 50%;
        }
        .paragraphs textarea{
            width: 100%;
        }
        .star-wrap svg{
            width: 30px;
        }
        .news__item {
            width: 80%;
        }
        .your_impressions{
            font-size: 34px;
            line-height: 25px;
        }
    }
    @media screen and (max-width: 767px) {
        .news__item {
            width: 100%;
        }
        .paragraphs textarea{
            width: 100%;
        }
        .news__item {
            width: 100%;
        }
        .your_impressions{
            font-size: 28px;
            line-height: 35px;
        }
        ol{
            padding-left: 1em; 
        }
    }
</style>

<svg xmlns="http://www.w3.org/2000/svg">
    <defs>
        <symbol id="star" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 0L24.4903 15.638L39.0211 15.638L27.2654 25.3029L31.7557 40.9409L20 31.2761L8.2443 40.9409L12.7346 25.3029L0.97887 15.638L15.5097 15.638L20 0Z" fill="currentColor"/>
        </symbol>
    </defs>
</svg>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    Vue.component('star-rating', {

props: {
  'name': String,
  'value': null,
  'id': String,
  'disabled': Boolean,
  'required': Boolean
},

template: '<div class="star-rating">\
      <label class="star-rating__star" v-for="rating in ratings" \
      :class="{\'is-selected\': ((value >= rating) && value != null), \'is-disabled\': disabled}" \
      v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">\
      <input class="star-rating star-rating__checkbox" type="radio" :value="rating" :name="name" \
      v-model="value" :disabled="disabled">★</label></div>',

/*
 * Initial state of the component's data.
 */
data: function() {
  return {
    temp_value: null,
    ratings: [1, 2, 3, 4, 5]
  };
},

methods: {
  /*
   * Behaviour of the stars on mouseover.
   */
  star_over: function(index) {
    var self = this;

    if (!this.disabled) {
      this.temp_value = this.value;
      return this.value = index;
    }

  },

  /*
   * Behaviour of the stars on mouseout.
   */
  star_out: function() {
    var self = this;

    if (!this.disabled) {
      return this.value = this.temp_value;
    }
  },

  /*
   * Set the rating.
   */
  set: function(value) {
    var self = this;

    if (!this.disabled) {
      this.temp_value = value;
      return this.value = value;
    }
  }
}
});

new Vue({
el: '#app'
});
    
    const rating = new Vue({
        el: '#rating',
        data: {
            
            now: new Date(),
            stars: 0,
            checkboxImage: 'https://ru.opensuse.org/images/4/4f/Icon-checked.png',
            checkboxText: ['Неудобный сайт', 'Неудобный поисковик', 'Некорректная консультация', 'Не оперативная доставка', 'Долгая выдача'],
            checkboxTextResponse: [],
            textareaProblem: '',
            textareaImprove: '',
            hoveredCheckbox: true,
        },
        methods: {
            setStars(i) {
                this.stars = i
                console.log(this.stars)
                console.log(this.checkboxTextResponse)
            },
            setCheckbox(i) {
                if (this.checkboxTextResponse.includes(this.checkboxText[i-1])){
                    let index = this.checkboxTextResponse.indexOf(this.checkboxText[i-1])
                    this.checkboxTextResponse.splice(index, 1)
                    //console.log(this.checkboxTextResponse)
                    //console.log(this.isChecked)
                } else {
                    this.checkboxTextResponse.push(this.checkboxText[i-1])
                    //console.log(this.checkboxTextResponse)
                    //console.log(this.isChecked)
                }
            },
            editProblem(event, key) {
                console.log('Значение поля textarea problem =', event.target.value);
                this.textareaProblem = event.target.value
            },
            editImprove(event, key) {
                console.log('Значение поля textarea improve =', event.target.value);
                this.textareaImprove = event.target.value
            }
            
        },
        components: {
            // 'base-checkbox': baseCheckbox,
        },
        computed: {
            
        },
        mounted() {

        },
        
    })

    


</script>




