<template>
    <div>
        <div class="row header_store">
            <div class="col-md-12" style="padding:0px 5px 0px 5px">
                <div class="row">
                    <div class="col-md-2 mt-2 col-6">
                        <div id="parentx">
                            <vs-button @click="active=!active" color="success" type="filled">سبد خرید</vs-button>
                                <vs-sidebar position-right  parent="body" default-index="1"  color="primary" class="sidebarx" spacer v-model="active">
                                    <div class="header-sidebar" slot="header">
                                        
                                    <div class="row">
                                        <div class="col-12">
                                            <img v-bind:src="this.store_img" style="margin-top:-15px" width="100px" alt="">
                                        </div>
                                    </div>
                                        <p>{{this.store_name}}</p>
                                        <p style="font-size:10px">{{this.store_desc}}</p>
                                    </div>

                                    <div v-for="item in items" :key="item.id" style="width:100%">
                                        <div v-show="item.quantity > 0" class="row mt-3" >    
                                            <div class="col-3">
                                                <img v-bind:src="item.img" width="70px" alt="" >
                                            </div>
                                            <div class="col-5 mr-0 pr-0">
                                                <p class="mt-2" style="font-size:13px;font-weight:bold">{{item.name}}</p>
                                                <p style="font-size:10px;margin-top:5px">{{item.desc}}</p>
                                                <p style="font-size:9px;">{{item.price}} تومان</p>
                                            </div>
                                            <div class="col-2 ml-0 mr-0 pl-0 pr-0">
                                                <div class="qincart">
                                                    <p style="padding:10px 2px 6px">{{item.quantity}}</p>
                                                </div>
                                                <svg class="pincart" width="20px" v-on:click="plus(item.id)" style="margin-right:4px;color:black" height="20px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path></svg>
                                                <svg class="mincart" width="20px" v-show="item.quantity > 1" v-on:click="minus(item.id)" height="20px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="color:black"><path d="M5.007 11C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1h13.986C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H5.007z"></path></svg>
                                                <svg class="dincart" width="20px" v-show="item.quantity === 1" v-on:click="del(item.id)"  height="20px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="padding:2px;height: 20px; width: 20px;color:black"><path d="M15 4h4.504c.274 0 .496.216.496.495v2.01a.498.498 0 0 1-.496.495H19v13.006A2 2 0 0 1 16.994 22H7.006A2.001 2.001 0 0 1 5 20.006V7h-.504A.492.492 0 0 1 4 6.505v-2.01C4 4.222 4.226 4 4.496 4H9V2.999A1 1 0 0 1 9.99 2h4.02c.546 0 .99.443.99.999V4zm-.491 1H5v1h14V5h-4.491zM6 7.105v12.888C6 20.55 6.449 21 7.002 21h9.996A1.01 1.01 0 0 0 18 19.993V7.105A.1.1 0 0 0 17.896 7H6.104A.109.109 0 0 0 6 7.105zm4-3.997V5h4V3.108c0-.059-.044-.108-.099-.108H10.1c-.054 0-.099.048-.099.108zM9 10.5c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7zm5 0c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7z"></path></svg>
                                            </div>

                                            <div class="col-2">
                                                    <p style="font-size:10px;margin-top:14px;padding:3px;">{{item.quantity * item.price}}</p>
                                                    <p style="font-size:12px;text-align:center">تومان</p>
                                            </div>

                                        </div>    
                                    </div>

                                    <div class="footer-sidebar" slot="footer" style="text-align:center;margin:auto;">
                                        <button v-on:click="checkout_cart" class="btn btn-success m-2 pr-5 pl-5">تایید سبد خرید </button>

                                    </div>
                            </vs-sidebar>
                        </div>
                    </div>
                    <div class="col-md-2 mt-2 col-6 account_header">
                            <p style="margin-top:10px;color:white">{{this.user_data.name}} عزیز <span style="font-size:10px">خوش آمدید</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="22px" height="22px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/></svg> 
                            </p>
                            
                    </div>
                    
                    <div class="col-md-4 hidein_mobile"></div>

                    <div class="col-md-2 mt-2 list_store" @click="popupActivo=true" style="text-align:center">
                            <p style="margin-top:10px;color:white">لیست فروشگاه ها
                                <svg  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="white" width="25px" height="25px"><g><rect fill="none" height="24" width="24"/></g><g><g/><g><path d="M21.9,8.89l-1.05-4.37c-0.22-0.9-1-1.52-1.91-1.52H5.05C4.15,3,3.36,3.63,3.15,4.52L2.1,8.89 c-0.24,1.02-0.02,2.06,0.62,2.88C2.8,11.88,2.91,11.96,3,12.06V19c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-6.94 c0.09-0.09,0.2-0.18,0.28-0.28C21.92,10.96,22.15,9.91,21.9,8.89z M18.91,4.99l1.05,4.37c0.1,0.42,0.01,0.84-0.25,1.17 C19.57,10.71,19.27,11,18.77,11c-0.61,0-1.14-0.49-1.21-1.14L16.98,5L18.91,4.99z M13,5h1.96l0.54,4.52 c0.05,0.39-0.07,0.78-0.33,1.07C14.95,10.85,14.63,11,14.22,11C13.55,11,13,10.41,13,9.69V5z M8.49,9.52L9.04,5H11v4.69 C11,10.41,10.45,11,9.71,11c-0.34,0-0.65-0.15-0.89-0.41C8.57,10.3,8.45,9.91,8.49,9.52z M4.04,9.36L5.05,5h1.97L6.44,9.86 C6.36,10.51,5.84,11,5.23,11c-0.49,0-0.8-0.29-0.93-0.47C4.03,10.21,3.94,9.78,4.04,9.36z M5,19v-6.03C5.08,12.98,5.15,13,5.23,13 c0.87,0,1.66-0.36,2.24-0.95c0.6,0.6,1.4,0.95,2.31,0.95c0.87,0,1.65-0.36,2.23-0.93c0.59,0.57,1.39,0.93,2.29,0.93 c0.84,0,1.64-0.35,2.24-0.95c0.58,0.59,1.37,0.95,2.24,0.95c0.08,0,0.15-0.02,0.23-0.03V19H5z"/></g></g></svg>                            
                            </p>

                            <vs-popup class="holamundo"  title="انتخاب فروشگاه" :active.sync="popupActivo">
                                <div class="row">
                                    <div class="col-4" style="text-align:center" v-on:click="load(user_id,1)">
                                        <img class="select_store_img" src="/assets/store/فروشگاه_الف.png"  alt="">
                                        <p class="select_store_title">فروشگاه الف</p>
                                        <p class="select_store_desc">برترین فروشگاه شمال شهر</p>
                                        <p class="select_store_stock">موجودی : 4000 کالا</p>
                                    </div>

                                    <div class="col-4" style="text-align:center" v-on:click="load(user_id,2)">
                                        <img class="select_store_img" src="/assets/store/فروشگاه_ب.png"  alt="">
                                        <p class="select_store_title">فروشگاه ب</p>
                                        <p class="select_store_desc">هایپر مارکت برتر  </p>
                                        <p class="select_store_stock">موجودی : 6500 کالا</p>
                                    </div>

                                    <div class="col-4" style="text-align:center" v-on:click="load(user_id,3)">
                                        <img class="select_store_img" src="/assets/store/فروشگاه_ج.png"  alt="">
                                        <p class="select_store_title">فروشگاه ج</p>
                                        <p class="select_store_desc"> سوپر مارکت لوکس</p>
                                        <p class="select_store_stock">موجودی : 3000 کالا</p>
                                    </div>
                                </div>
                            </vs-popup>
                    </div>

                    <div class="col-md-2 col-6 mt-3" style="text-align:center" @click="creadit_popup=true">
                        <p style="color:white">کیف پول : {{this.user_data.creadit}} تومان
                        </p>
                        
                    </div>
                </div>
                    <vs-popup class="holamundo" style="text-align:center"  title="شارژ کیف پول" :active.sync="creadit_popup">
                        <img src="/assets/img/money.png" width="180px" alt="">
                        <br>
                        <br>
                        <p>با شارژ حساب خود به راحتی خرید کنید <br>  از جوایز ما نیز برخوردار شوید.</p> <br>
                            <vs-button color="success" v-on:click="pay_money(100)" type="gradient">100 هزار تومان</vs-button>
                            <vs-button color="danger" v-on:click="pay_money(200)" type="gradient">200 هزار تومان</vs-button>
                            <vs-button color="warning" v-on:click="pay_money(300)" type="gradient">300 هزار تومان</vs-button>
                    </vs-popup>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 store_info">
                        <img v-bind:src="this.store_img" class="store_image" alt="" @click="popupActivo=true">
                        <p class="store_name">{{this.store_name}}</p>
                        <p class="store_desc">{{this.store_desc}}</p>
                        <vs-input style="margin-top:12px;" icon="search" placeholder="جست جو ..."/>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="direction:ltr;background:#F7F7F7">
            <div class="col-md-12 col_product" style="margin:20px;">
                <p class="cate_slide">لبنیات</p>
                <carousel  :perPageCustom="[[768,2],[1024,7]]" :navigationEnabled="true">
                    <slide v-for="item in items" :key="item.id" v-if="item.cate === 'لبنیات'">
                        <div class="container_product" >
                            <svg width="25px" class="plus_icon_on_product" v-on:click="add(item.id)" height="25px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path></svg>
                            <div class="control_cart" v-bind:class="(item.quantity > 0) ? 'show_control' : 'control_cart_hide'">
                                <vs-row>
                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center"  v-show="item.quantity <= 1">
                                        <div v-on:click="del(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px"   height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="height: 24px; width: 24px;color:#51B63A;margin-top:8px"><path d="M15 4h4.504c.274 0 .496.216.496.495v2.01a.498.498 0 0 1-.496.495H19v13.006A2 2 0 0 1 16.994 22H7.006A2.001 2.001 0 0 1 5 20.006V7h-.504A.492.492 0 0 1 4 6.505v-2.01C4 4.222 4.226 4 4.496 4H9V2.999A1 1 0 0 1 9.99 2h4.02c.546 0 .99.443.99.999V4zm-.491 1H5v1h14V5h-4.491zM6 7.105v12.888C6 20.55 6.449 21 7.002 21h9.996A1.01 1.01 0 0 0 18 19.993V7.105A.1.1 0 0 0 17.896 7H6.104A.109.109 0 0 0 6 7.105zm4-3.997V5h4V3.108c0-.059-.044-.108-.099-.108H10.1c-.054 0-.099.048-.099.108zM9 10.5c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7zm5 0c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7z"></path></svg>
                                        </div>
                                    </vs-col>

                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center"  v-show="item.quantity > 1">
                                        <div v-on:click="minus(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="color:#51B63A;margin-top:8px"><path d="M5.007 11C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1h13.986C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H5.007z"></path></svg>
                                        </div>
                                    </vs-col>
                                    
                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center" >
                                        <div style="">
                                            <p id="quan" style="margin-top:8px">{{item.quantity}}</p> 
                                        </div>   
                                    </vs-col>

                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center" >
                                        <div v-on:click="plus(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px"  height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="color:#51B63A;margin-top:8px"><path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path></svg>                     
                                        </div>
                                    </vs-col>
                                </vs-row>
                            </div>
                            <img width="150px" class="img_product" v-bind:src="item.img" alt="">
                            <p class="product_price">  {{item.price}} تومان</p>
                            <p class="product_name">{{item.name}}</p>
                            <p class="product_desc">{{item.desc}}</p>

                        </div>
                    </slide>
  
                </carousel>
            </div>
        </div>


   <div class="row" style="direction:ltr;background:#F7F7F7">
            <div class="col-md-12 col_product" style="margin:20px;">
                <p class="cate_slide">متفرقه</p>
                <carousel  :perPageCustom="[[768,2],[1024,7]]" :navigationEnabled="true">
                    <slide v-for="item in items" :key="item.id" v-if="item.cate === 'متفرقه'">
                        <div class="container_product" >
                            <svg width="25px" class="plus_icon_on_product" v-on:click="add(item.id)" height="25px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path></svg>
                            <div class="control_cart" v-bind:class="(item.quantity > 0) ? 'show_control' : 'control_cart_hide'">
                                <vs-row>
                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center"  v-show="item.quantity <= 1">
                                        <div v-on:click="del(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px"   height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="height: 24px; width: 24px;color:#51B63A;margin-top:8px"><path d="M15 4h4.504c.274 0 .496.216.496.495v2.01a.498.498 0 0 1-.496.495H19v13.006A2 2 0 0 1 16.994 22H7.006A2.001 2.001 0 0 1 5 20.006V7h-.504A.492.492 0 0 1 4 6.505v-2.01C4 4.222 4.226 4 4.496 4H9V2.999A1 1 0 0 1 9.99 2h4.02c.546 0 .99.443.99.999V4zm-.491 1H5v1h14V5h-4.491zM6 7.105v12.888C6 20.55 6.449 21 7.002 21h9.996A1.01 1.01 0 0 0 18 19.993V7.105A.1.1 0 0 0 17.896 7H6.104A.109.109 0 0 0 6 7.105zm4-3.997V5h4V3.108c0-.059-.044-.108-.099-.108H10.1c-.054 0-.099.048-.099.108zM9 10.5c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7zm5 0c0-.276.232-.5.5-.5.276 0 .5.23.5.5v7c0 .276-.232.5-.5.5-.276 0-.5-.23-.5-.5v-7z"></path></svg>
                                        </div>
                                    </vs-col>

                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center"  v-show="item.quantity > 1">
                                        <div v-on:click="minus(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="color:#51B63A;margin-top:8px"><path d="M5.007 11C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1h13.986C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H5.007z"></path></svg>
                                        </div>
                                    </vs-col>
                                    
                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center" >
                                        <div style="">
                                            <p id="quan" style="margin-top:8px">{{item.quantity}}</p> 
                                        </div>   
                                    </vs-col>

                                    <vs-col vs-type="flex" vs-w="4" vs-justify="center" >
                                        <div v-on:click="plus(item.id)" style="width:60px;height:40px;z-index:1000;text-align:center">
                                            <svg width="24px"  height="24px" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" style="color:#51B63A;margin-top:8px"><path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path></svg>                     
                                        </div>
                                    </vs-col>
                                </vs-row>
                            </div>
                            <img width="150px" class="img_product" v-bind:src="item.img" alt="">
                            <p class="product_price">  {{item.price}} تومان</p>
                            <p class="product_name">{{item.name}}</p>
                            <p class="product_desc">{{item.desc}}</p>

                        </div>
                    </slide>
  
                </carousel>
            </div>
        </div>


       
    </div>
</template>

<script>
export default {
        data: () =>({
            active: false,
            items : '' ,
            store_id : '1',
            store_img : '',
            store_name : '',
            store_desc : '',
            cache : '',
            popupActivo: false,
            user_id : 0,
            user_data : '',
            creadit_popup:false,
            pay_money_data : 0

        }),
        created(){
            axios.post('/store/whologin',{
                data : 'islogin'
            }).then((response)=>{
                if(response.data.id > 0){
                    this.user_id = response.data.id
                    this.user_data = response.data.data
                    this.load(this.user_id,1)
                }else{

                }
            })
        },
        methods:{
            load:function(user_id,store_id){
                axios.post('/store/load',{
                    data : {'user_id' : user_id , 'store_id' : store_id}
                }).then((response)=>{
                    this.store_img = response.data.img
                    this.store_name = response.data.name
                    this.store_desc = response.data.desc
                    this.items = response.data.items
                    this.cache = response.data.cache
                    this.store_id = store_id
                    this.loginstep = 1

                    for(var i=0;i<this.cache.length;i++){
                        for(var j=0;j<this.items.length;j++){
                            if(this.cache[i].item_id === this.items[j].id){
                                this.items[j].quantity = this.cache[i].quantity
                            }
                        }
                    }
                    this.popupActivo = false
                })
            },

            add:function(item_id){
                for(var i=0;i<this.items.length;i++){
                    if(this.items[i].id === item_id){
                        this.items[i].quantity = 1 
                    }
                }
                axios.post('/store/update_cart',{
                    data : {'user_id' : this.user_id , 'store_id' : this.store_id , 'item_id' : item_id ,'quantity' : 1}
                    }).then((response)=>{
                    
                })
            },

            plus:function(item_id){
                for(var i=0;i<this.items.length;i++){
                    if(this.items[i].id === item_id){
                        if(this.items[i].quantity < 25){
                            this.items[i].quantity = this.items[i].quantity + 1 
                            axios.post('/store/update_cart',{
                            data : {'user_id' : this.user_id , 'store_id' : this.store_id , 'item_id' : item_id ,'quantity' : this.items[i].quantity}
                                }).then((response)=>{   
                        })
                        }else{
                            this.$vs.notify({title:'خطا حداکثر خرید',text:'حداکثر خرید برای کالا 25 عدد میباشد',color:'warning',position:'top-center'})
                        }
                        
                    }
                }
                
            },

            minus:function(item_id){
                for(var i=0;i<this.items.length;i++){
                    if(this.items[i].id === item_id){
                        this.items[i].quantity = this.items[i].quantity - 1 

                        axios.post('/store/update_cart',{
                        data : {'user_id' : this.user_id , 'store_id' : this.store_id , 'item_id' : item_id ,'quantity' : this.items[i].quantity}
                            }).then((response)=>{
                    
                        })
                    }
                }
            },

            del:function(item_id){
                for(var i=0;i<this.items.length;i++){
                    if(this.items[i].id === item_id){
                        this.items[i].quantity = 0
                    }
                }
                axios.post('/store/update_cart',{
                    data : {'user_id' : this.user_id , 'store_id' : this.store_id , 'item_id' : item_id ,'quantity' : 0}
                    }).then((response)=>{
                    
                })
            },
            checkout_cart:function(){
                this.active = false
                setTimeout(() => {
                    this.$router.push('checkout').catch(err => {})                
                },300);
            },
            pay_money:function(value){
                this.pay_money_data = value;    
            }
        },     
}
</script>

