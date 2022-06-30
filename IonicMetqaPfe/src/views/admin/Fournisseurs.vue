<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/adminhome"></ion-back-button>
         <ion-text><h3>Partenaire</h3></ion-text>

    </ion-buttons>
      </ion-toolbar>
       <img class="rr" src="assets/logo.png" />
    <ion-searchbar class="co" v-model="search" @keyup="searche()"></ion-searchbar>
    </ion-header>
    
    <ion-content>
      <div class="content">
      <ion-card v-for="fournisseur in fournisseurs" :key="fournisseur" >
      <img class="rr" :src="'http://192.168.125.159:8000/uploads/fournisseurs/'+fournisseur.logo_image" style="height:10%;"/>
        <ion-card-header>Nom : {{fournisseur.nom}}</ion-card-header>
        <ion-card-header>Email : {{fournisseur.email}}</ion-card-header>
        <ion-card-header>Telephone :{{fournisseur.phone}} </ion-card-header>
        <ion-button id="f" color="danger" @click="deleteFour(fournisseur.id)"  expand="full" fill="outline" class="userUnFollow"><ion-icon :src="trash"></ion-icon> SUPPRIMER</ion-button>
        <ion-button id="f" color="success" expand="full" fill="outline" class="userUnFollow"><ion-icon :src="create"  ></ion-icon> MODIFIER</ion-button>  
      </ion-card>
    </div>
    </ion-content>
    <ion-footer collapse="fade">
   
  

        <ion-fab-button  router-link="/addfournisseurs">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
    
 
  </ion-footer>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonCard,IonCardHeader,IonFooter,IonSearchbar
 ,IonButton,IonFabButton,IonIcon,toastController,IonButtons,IonBackButton
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      fournisseurs: [], 
      search:"",
      nbrs:"",
      
url:"http://192.168.125.159:8000"
    }
    
  },methods:{
    deleteFour(fourId: any) {
                axios.delete(this.url+'/api/deletefournisseur/'+fourId  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/fournisseur')
      .then(res => this.fournisseurs = res.data)
    
      await toast.present();
          this.$router.push({name:'FournisseursPage'});
      })  
  },
    searche(){
        
        if(this.search !=""){
         axios
         .get(this.url+'/api/searchfourn/'+this.search)
        .then(response => (this.fournisseurs = response.data))
        .catch(error => console.log(error))
        
        } else {
          axios.get(this.url+'/api/fournisseur')
          .then(response => (this.fournisseurs = response.data))
        .catch(error => console.log(error))
        }
    }
    
  
  },
  created() {
    axios.get(this.url+'/api/fournisseur')
      .then(res => this.fournisseurs = res.data)
    
  },name: 'FournisseursPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonSearchbar,
    IonToolbar,
    IonButton
 ,IonIcon,IonButtons,IonBackButton
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
