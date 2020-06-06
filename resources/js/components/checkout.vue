<template>
    <div  style="background:#F7F7F7;height:100vh">
            <div class="row head_checkout">

            </div>

            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-2" style="text-align:center">
                    <vs-button v-on:click="goto(1)" type="line">تایید آدرس</vs-button>
                </div>
                <div class="col-md-2" style="text-align:center">
                    <vs-button v-on:click="goto(2)" type="line" color="warning">انتخاب فروشگاه</vs-button>
                </div>
                <div class="col-md-2" style="text-align:center">
                    <vs-button v-on:click="goto(3)" type="line" color="success">تایید نهایی</vs-button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <div class="checkout_box p-3" v-show="this.step === 1">     
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" width="28px" height="28px"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 1v3h3v2h-3v3h-2V6h-3V4h3V1h2zm-8 12c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm2-9.75V7h3v3h2.92c.05.39.08.79.08 1.2 0 3.32-2.67 7.25-8 11.8-5.33-4.55-8-8.48-8-11.8C4 6.22 7.8 3 12 3c.68 0 1.35.08 2 .25z"/></svg>
                       تعیین آدرس : 

                       <div class="mt-4" v-show="this.stepaddress === 0" style="text-align:right">
                           <div v-for="item in addresses" :key="item.address">
                                <vs-radio color="success" v-model="address" v-bind:vs-value="item.region + '  -  ' + item.address + '  -  ' + item.etc">
                                    <div style="padding-right:20px">
                                       <p style="font-size:16px"> {{item.region}} </p> 
                                       <p style="font-size:12px"> {{item.address}} </p> 

                                    </div>

                                </vs-radio>

                           </div>
                           <p class="mt-5" style="font-size:12px;padding-right:20px" v-on:click="newaddress(1)">افزودن آدرس جدید</p>
                       </div>

                       <div class="" v-show="this.stepaddress === 1"  style="text-align:right">

                           <div class="row">
                               <div class="col-md-8 mt-3">
                                   <label for="region">منطقه : </label>
                                   <input class="form-control" name="region" type="text" v-model="region">
                               </div>
                           </div>

                           <div class="row">
                               <div class="col-md-12 mt-2">
                                   <label for="region">آدرس : </label>
                                   <input class="form-control" name="address" type="text" v-model="address_new">
                              
                               </div>
                           </div>

                           <div class="row">
                               <div class="col-md-6 mt-2">
                                    <label for="region">کد پستی : </label>
                                   <input class="form-control" name="code" type="text" v-model="code">
                              
                               </div>
                               <div class="col-md-6 mt-2">
                                    <label for="region">توضیحات : </label>
                                   <input class="form-control" name="etc" type="text" v-model="etc">
                               </div>
                           </div>

                            <div class="row mt-5">
                                <div class="col-md-12" style="text-align:center;">
                                    <vs-button color="success" v-on:click="send_new_address(2)" type="gradient">تایید آدرس</vs-button>
                                </div>
                                    <p class="mt-5" style="font-size:12px;padding-right:20px" v-on:click="newaddress(0)">بازگشت</p>

                            </div>
                       </div>

                    </div>

                    <div class="checkout_box p-3" v-show="this.step === 2">     
                       
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>             
                            تایید نهایی محصولات: 

                        <div class="row mt-4">
                            <div class="col-md-3"></div>
                            <div class="col-md-2 col-4">
                                <p v-on:click="load(1)" style="text-align:center">فروشگاه الف </p>
                            </div>
                            <div class="col-md-2 col-4">
                                <p v-on:click="load(2)" style="text-align:center">فروشگاه ب</p>
                            </div>
                            <div class="col-md-2 col-4">
                                <p v-on:click="load(3)" style="text-align:center">فروشگاه ج</p>
                            </div>
                        </div>


                        <div class="mt-3" style="box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.15);padding:10px;border-radius:3px">
                            <p>{{this.store_name_ok}} :</p> 
                        <div class="mt-4 row" v-show="this.stepaddress === 0" style="text-align:right">
                            <div class="col-md-2 col-4" v-for="item in items" :key="item.address" v-if="item.quantity > 0">
                                        <img v-bind:src="item.img" width="70px" alt=""> 
                                        <p style="font-size:10px;margin-top:5px">{{item.name}}</p>
                                        <p style="font-size:8px">{{item.desc}}</p>
                                        <p style="font-size:7px;margin-top:8px;">   {{item.price}}  تومان  </p>
                                        <div style="position:absolute;top:0px;transform:rotate(37deg);font-size:9px">X{{item.quantity}}</div>
                            </div>
                        </div>
                        </div>
                        <div class="mt-5" style="text-align:center">
                            <vs-button color="success" type="gradient" v-on:click="store_approv">{{this.store_name_ok}}</vs-button>
                        </div>

                    </div>

                    <div class="checkout_box p-3" v-show="this.step === 3">     
                       تایید و پرداخت : 
                            <p style="text-align:center;font-size:12px;margin-top:50px">در صورتی که دریافت کننده خود شما هستید نیاز به وارد کردن شماره تلفن تحویل گیرنده نیست</p>
                        <vs-input style="margin-top:30px" icon-after="true"  icon="local_phone" @keypress="isNumber($event)" label-placeholder="شماره تلفن دریافت کننده :" v-model="phone2"/>
                        
                        <div style="text-align:center">
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px"> نام سفارش دهنده : {{this.name}}</p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px"> شماره سفارش دهنده   : {{this.phone}}</p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px"> شماره تحویل گیرنده   : {{this.phone2}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px">  کدپیگیری   : {{this.code_order}}</p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px">    تاریخ سفارش  : {{this.date_order}}</p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p style="font-size:12px">   قیمتی نهایی  : {{this.total}} تومان</p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <p style="font-size:12px;text-align:right;padding-right:30px">آدرس تحویل گیرنده : {{this.address}}</p>
                                </div>
                            </div>
                            
                            <vs-button style="margin-top:50px;" @click="payment_popup=true" type="gradient">پرداخت</vs-button>
                            <vs-popup class="holamundo"  title="فاکتور نهایی" :active.sync="payment_popup">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align:center">
                                            <p>{{this.store_name_ok}}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3 col-3"><p style="font-size:12px;font-weight:bold">کالا</p></div>
                                                <div class="col-md-4 col-4"><p style="font-size:12px;font-weight:bold">شرح کالا</p></div>
                                                <div class="col-md-2 col-2"><p style="font-size:12px;font-weight:bold">قیمت</p></div>
                                                <div class="col-md-1 col-1"><p style="font-size:12px;font-weight:bold">تعداد</p></div>
                                                <div class="col-md-2 col-1"><p style="font-size:12px;font-weight:bold">جمع</p></div>
                                            </div>
                                            <div class="row mt-2" v-for="item in items" :key="item.id" v-show="item.quantity > 0">
                                                <div class="col-md-3 col-3"><p style="font-size:9px">{{item.name}}</p></div>
                                                <div class="col-md-4 col-4"><p style="font-size:9px">{{item.desc}}</p></div>
                                                <div class="col-md-2 col-2"><p style="font-size:9px">{{item.price}}</p></div>
                                                <div class="col-md-1 col-1"><p style="font-size:9px">{{item.quantity}}</p></div>
                                                <div class="col-md-2 col-1"><p style="font-size:9px">{{item.quantity * item.price}} </p></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <vs-divider border-style="dashed" color="dark">پرداخت</vs-divider>
                                                <p style="text-align:center">کیف پول شما : {{this.creadit}}</p>
                                                <p style="text-align:center"> پرداخت  : {{this.total}}</p>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <vs-button type="gradient">پرداخت اینترنتی</vs-button>
                                                </div>
                                                <div class="col-6">
                                                    <div v-if="this.creadit < this.total">
                                                        <vs-button type="gradient" color="danger" style="padding:10px">کمبود موجودی</vs-button>

                                                    </div>
                                                    <div v-else-if="this.creadit > this.total">
                                                        <vs-button type="gradient" color="success">{{this.creadit}}</vs-button>

                                                    </div>                             
                                               </div>
                                            </div>

                                        </div>
                                    </div>

                                </vs-popup>
                        </div>
                        
                    </div>

                </div>
        </div>
    </div>
</template>

<script>
export default {
        data(){
            return{
                'name' : '',
                'phone' : '',
                'addresses' : '',
                'phone2' : '',

                'creadit':0,

                'region' : '',
                'address' : '',
                'etc' : '',
                'code' : '',
                'address_new' : '',

                'stepaddress' : 0,
                'step' : 1 ,

                'items' : '',
                'cart' : '',
                'total' : 0,
                'clicked_approved_store' : 0,

                'code_order':'',
                'date_order' : '',

                'store_name_ok' : '',
                payment_popup : false
            }
        },
        created(){
             this.load(1)
        },
        methods:{
            
            load:function(id){
                 axios.post('/getdata_checkout',{
                'data' : {'user' : 'ok'}
            }).then((response)=>{
                this.items = ''
                this.name = response.data.user_info.name
                this.phone = response.data.user_info.phone
                this.creadit = response.data.user_info.creadit
                this.addresses = response.data.address
                this.items = response.data.item
                this.cart = response.data.cart
                this.total = 0

                for(var i=0;i<this.cart.length;i++){
                    if(this.cart[i].store_id === id){
                        for(var j=0;j<this.items.length;j++){
                            if(this.cart[i].item_id === this.items[j].id){
                                this.items[j].quantity = this.cart[i].quantity
                                this.total = this.total + (this.items[j].price * this.items[j].quantity)
                            }
                        }
                    }
                }
                if(id === 1){
                    this.store_name_ok = 'فروشگاه الف'
                }else if(id === 2){
                    this.store_name_ok = 'فروشگاه ب'
                }else if (id === 3){
                    this.store_name_ok = 'فروشگاه ج'
                }
            })
            },
            newaddress:function(b){
                this.stepaddress = b
            },
            send_new_address:function(b){
                if(this.region.length < 2) {
                    this.$vs.notify({title:'خطا',text:'لطفا فیلد منطقه را پر کنید',color:'red',position:'top-center'})
                }else if(this.address_new.length < 4){
                    this.$vs.notify({title:'خطا',text:'لطفا فیلد آدرس را پر کنید',color:'red',position:'top-center'})
                }else{
                    axios.post('/add_address_touser',{
                        data : {'region' : this.region , 'address' : this.address_new , 'code' : this.code , 'etc' : this.etc}
                    }).then((response)=>{
                        this.load(1)
                        this.stepaddress = 0
                    })
                }
            },
            store_approv:function(){
                if(this.total > 10000){
                    var store_id = this.store_name_ok
                    this.step = 3
                    this.clicked_approved_store = 1
                }else{
                    this.$vs.notify({title:'حداقل خرید',text:' حداقل خرید از فروشگاه 10 هزار تومن می باشد ',color:'danger',position:'top-center'})
                }
                
            },
            isNumber: function(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        evt.preventDefault();;
                        this.$vs.notify({title:'ورودی نامعتبر',text:'در فیلد شماره تلفن فقط عدد وارد کنید',color:'danger',position:'top-center'})

                    }else if(this.phone2.length > 10){
                        this.$vs.notify({title:'ورودی نامعتبر',text:'فیلد شماره تلفن باید دارای 11 کاراکتر باشد',color:'danger',position:'top-center'})
                        evt.preventDefault();;

                    } 
                    else {
                        return true;
                    }
            },
            goto:function(id){
                if(id === 1){
                    this.step = 1
                }else if(id === 2){
                    if(this.address.length < 3){
                        this.$vs.notify({title:'آدرس نامتعبر',text:'لطفا آدرس خود را در ابتدا وارد کنید',color:'danger',position:'top-center'})
                    }else{
                        this.step = 2
                    }
                }else if(id === 3){
                    if(this.address.length < 3){
                        this.$vs.notify({title:'آدرس نامتعبر',text:'لطفا آدرس خود را در ابتدا وارد کنید',color:'danger',position:'top-center'})
                    }else if(this.clicked_approved_store === 0){
                        this.$vs.notify({title:'فروشگاه نامتعبر',text:' لطفا فروشگاه خود را انتخاب کنید ',color:'danger',position:'top-center'})
                    }else if(this.total < 30000){
                        this.$vs.notify({title:'حداقل خرید',text:'حداقل خرید از هر فروشگاه 30 هزار تومن هست ',color:'danger',position:'top-center'})
                    }
                    else{
                        this.step = 3
                    }
                }
            },
            
        },
        watch:{
            address:function(){
                 this.step = 2
            }
        }
}
</script>

