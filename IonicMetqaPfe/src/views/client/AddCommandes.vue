<template >
  <ion-page >

      <ion-header :translucent="true" >
        <ion-toolbar class="hh" color="primary">
          <ion-buttons slot="start">
            <ion-back-button defaultHref="/commandess"></ion-back-button>
            <ion-text><h3>Ajouter Commande</h3></ion-text>
          </ion-buttons>
        </ion-toolbar>
        <img class="rr" src="assets/logo.png" />
      </ion-header>

      <ion-content>
        {{arrayyy}}
        {{form}}
        
        <div class="content">
        <form>

          <ion-card v-for="stock in stocks" :key="stock.id" >
      <img class="rr" :src="'http://127.0.0.1:8000/uploads/stocks/'+stock.image" style="height:10%;"/>
        <ion-card-header style="text-align:center">Nom d'article : {{stock.articleNom}}</ion-card-header>
        <ion-card-header style="text-align:center">Prix Unitaire D'article : {{stock.articlePrixVente}} Qr</ion-card-header><br/>
        <ion-radio-group v-model="ff">
        <ion-checkbox :value="stock.id" class="bb" @mousedown="push(stock.id)"></ion-checkbox><br/><br/>
</ion-radio-group>

 

  <ion-item v-model="form">
            <ion-label>Quantite demander :</ion-label>
            <ion-input class="fff" placeholder="Saisir ICI" @change="qte"  v-model="form[stock.id]" type="number"></ion-input>
          </ion-item>

       

      </ion-card>
 <ion-button v-on:click="add()">Ajouter</ion-button>
   
        </form>
        
      </div>
      </ion-content>

  </ion-page>
</template>

<script lang="ts">
import {
  IonContent, IonHeader, IonPage, IonToolbar, IonButton, IonInput, IonBackButton, IonButtons, 
  toastController,IonItem,IonLabel,IonCard,IonCheckbox,IonCardHeader,IonRadioGroup
} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { sparkles,home,call,mail } from 'ionicons/icons';
addIcons(
    { 
       "sparkles":sparkles,"home":home,"call":call,"mail":mail
    }
    )
import axios from 'axios';
export default defineComponent({
  data() {
    return {
      stocks: [],
      stock: [],
      array: [] as Array <any>,
      arrayyy: [] as Array <any>,
      article: [] as Array <any>,
      commandes: [],
      ff: '',
      form:[null] as Array <any>,
      
url:"http://192.168.125.159:8000"


    }

  }, methods: {
   async push(id :any){
      this.array.push(id)

      this.arrayyy.splice(0,this.arrayyy.length)
this.array.forEach(lv => {
  this.arrayyy.push(lv); 

});

   
   },
   
    add() {
       
    for (let i = 0; i < this.form.length; i++) {
      const e = this.form[i];
      if(e==null){
        this.form.splice(i,1)
        i-=1;
      }
    }
for (let i = 0; i < this.form.length; i++) {
      const e = this.form[i];
     this.article.push(e)
    }
      axios.post(this.url+'/api/addcommande',{
        idclient:localStorage.getItem('id'),
        idarticle:this.array,
        systemQte:this.article,
    
        
      }).then(async ()=>{
         this.arrayyy.splice(0,this.arrayyy.length)
         const toast = await toastController.create({
        color: 'secondary',
        duration: 2000,
        message: 'Ajouté avec succès',
        
      });
 await toast.present();
      this.$router.push({ name: 'CommandePage' });
       
      })  
    }
  },
  created() {

  axios.get(this.url+'/api/commande')
      .then(res => this.commandes = res.data)
     
      axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)

  },
  name: 'AddCommandes',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonToolbar,
    IonButton,
    IonInput,
    IonBackButton,
    IonButtons,IonCard,IonCardHeader
    ,IonItem,IonLabel,IonCheckbox,IonRadioGroup
  }
});

</script>

<style scoped>
#container {
  text-align: center;

  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}

#container strong {
  font-size: 20px;
  line-height: 26px;
}

#container p {
  font-size: 16px;
  line-height: 22px;

  color: #8c8c8c;

  margin: 0;
}

#container a {
  text-decoration: none;
}

template {
  color: aqua;
}

.a {
  margin-left: 20%;
  background-color: blue;
}

.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}

.bb{text-align: center;margin-left: 45%;}
.fff{background-color: antiquewhite;}
</style>