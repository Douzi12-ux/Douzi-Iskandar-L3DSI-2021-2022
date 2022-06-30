<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/adminhome"></ion-back-button>
         <ion-text><h3>Articles</h3></ion-text>
         </ion-buttons>
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    <ion-searchbar class="co" v-model="search" @keyup="searche()"></ion-searchbar>
    </ion-header>
    
    <ion-content>
      <div class="content">
      <ion-card v-for="stock in stocks" :key="stock">
      <img class="rr" :src="'http://192.168.125.159:8000/uploads/stocks/'+stock.image" style="height:10%;"/>
        <ion-card-header >Reference : {{stock.articleRef}}</ion-card-header>
        <ion-card-header>Nom de Systeme : {{stock.articleNom}}</ion-card-header>
        <ion-card-header>Prix de Systeme :{{stock.articlePrixVente}}</ion-card-header>
        <ion-card-header>Quantite de Systeme : {{stock.articleQte}}</ion-card-header>
        <ion-button id="f" color="danger" @click="deleteStock(stock.id)"  expand="full" ><ion-icon :src="trash"></ion-icon> SUPPRIMER</ion-button>
        <router-link
                            :to="{ name: 'EditStocks', 
                  params: { 
                    id:stock.id,
                    image:stock.image,
                    articleRef:stock.articleRef,
                    articleNom:stock.articleNom,
                    articlePrixVente:stock.articlePrixVente,
                   articleQte:stock.articleQte,
               
                          } 
                      }">
       <ion-button id="f" color="success" expand="full"  href="/editstocks"><ion-icon :src="create"  ></ion-icon> MODIFIER</ion-button>  
</router-link>
     </ion-card>
      </div>
    </ion-content>

    <ion-footer collapse="fade">
        <ion-fab-button  router-link="/addstocks">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
  </ion-footer>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonCard,IonCardHeader,IonFooter
 ,IonButton,IonFabButton,IonIcon,toastController,IonBackButton,IonButtons,IonSearchbar
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      stocks: [], 
      search:"",
      nbrs:"",
url:"http://192.168.125.159:8000"
    }
    
  },methods:{
    deleteStock(stockId: any) {
                axios.delete(this.url+'/api/deletestock/'+stockId  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)
    
      await toast.present();
          this.$router.push({name:'StocksPage'});
          axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)
      })  
  },
    searche(){
        
        if(this.search !=""){
         axios
         .get(this.url+'/api/searchstocks/'+this.search)
        .then(response => (this.stocks = response.data))
        .catch(error => console.log(error))
        
        } else {
          axios.get(this.url+'/api/stock')
          .then(response => (this.stocks = response.data))
        .catch(error => console.log(error))
        }
    }
    
  
  },
  created() {
    axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)
    
  },name: 'StocksPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonBackButton,IonButtons,
    IonToolbar,
    IonButton
 ,IonIcon,IonSearchbar
 ,IonFabButton,IonFooter,IonCard,IonCardHeader
  },setup(){
    
  

    return {trash,create,add,swapVertical};
   
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


.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
.co{background-color: rgb(253, 253, 173);}
</style>
