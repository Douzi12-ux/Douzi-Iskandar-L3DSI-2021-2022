<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/clienthome"></ion-back-button>
         <ion-text><h3>Commandes</h3></ion-text>

    </ion-buttons>
      </ion-toolbar>
       <img class="rr" src="assets/logo.png" />
    <ion-searchbar class="co" v-model="search" @keyup="searche()"></ion-searchbar>
    </ion-header>
     <ion-header :translucent="true" >
      <ion-content>
      <ion-fab horizontal="end" vertical="top" slot="fixed" edge>
        <ion-fab-button router-link="/addcommandes">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
      </ion-fab>
      
      </ion-content>
    </ion-header>
    <ion-content>
      
      <div class="content">
        
          <ion-card v-for="commande in commandes" :key="commande" >
   
      
        <ion-card-header>Nom de client: {{commande.nomclient}}</ion-card-header>
        <ion-card-header>Email de client: {{commande.emailclient}}</ion-card-header>


      
<ion-card-header v-html="'Les article :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Prix d article<br/><br/>'+commande.idarticle"></ion-card-header>
        
        <ion-card-header>Prix Totale :{{commande.prixTotale}} Qar</ion-card-header>
        
        
          <ion-card-title v-if="commande.status==0">
          <ion-button id="f"  expand="full" fill="outline" class="userUnFollow"> En Cours..</ion-button> 
          <ion-button style="margin-left:17%"  color="success"> Modifier</ion-button>
          <ion-button  color="danger"> Supprimer</ion-button> 
          </ion-card-title>
          <ion-card-title v-if="commande.status==1"><ion-button id="f" color="success" expand="full" fill="outline" class="userUnFollow"> Confirmer</ion-button>  
           <ion-card-title ><ion-button id="f"  color="primary " expand="full" > Facture</ion-button>  </ion-card-title>
          </ion-card-title>
          <ion-card-title v-if="commande.status==2"><ion-button id="f"  color="danger" expand="full" fill="outline" class="userUnFollow"> Refuser</ion-button>  </ion-card-title>
         
 
     </ion-card>
    </div>
    </ion-content>
    
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonCard,IonCardHeader,IonSearchbar
 ,IonButton,IonFabButton,IonIcon,toastController,IonButtons,IonBackButton
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      commandes: [], 
      commandeidarticle: [], 
      nomfiltres: [],
      search:"",
      stocks:[],
      
      
url:"http://192.168.125.159:8000"
    }
    
  },methods:{
  
    deleteCom(fourId: any) {
                axios.delete(this.url+'/api/deletecommande/'+fourId  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/commande')
      .then(res => this.commandes = res.data)
    
      await toast.present();
          this.$router.push({name:'commandesPage'});
      })  
  },
    searche(){
        
        if(this.search !=""){
         axios
         .get(this.url+'/api/searchcom/'+this.search)
        .then(response => (this.commandes = response.data))
        .catch(error => console.log(error))
        
        } else {
         axios.get(this.url+'/api/commande')
      .then(res => this.commandes = res.data)
        .catch(error => console.log(error))
        }
    }
    
  
  },
  created() {
    axios.get(this.url+'/api/commande')
      .then(res => this.commandes = res.data);

    
     
      axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)
    
  },name: 'CommandePage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonSearchbar,
    IonToolbar,
    IonButton
 ,IonIcon,IonButtons,IonBackButton
 ,IonFabButton,IonCard,IonCardHeader
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

.a {
  margin-left: 20%;
  background-color: blue;
}
.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
.co{background-color: rgb(253, 253, 173);}
</style>
