<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/adminhome"></ion-back-button>
         <ion-text><h3>Archive</h3></ion-text>
         </ion-buttons>
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    <ion-searchbar class="co" v-model="search" @keyup="searche()"></ion-searchbar>
    </ion-header>
    
  
    <ion-content>
       <div class="content">
   <ion-item v-for="archive in archives" :key="archive">
        <ion-card style="width:100%">
        
        <ion-card-header>
          <ion-card-title>Departement : {{archive.iddepartement}} <ion-card-title>Description : {{archive.description}} </ion-card-title></ion-card-title>
          <ion-card-title>Fichier : {{archive.fichier}}</ion-card-title>
          <ion-card-title>Date D'archivage : {{archive.created_at}}</ion-card-title>
        </ion-card-header>
        <ion-button  :href="archive.fichierSrc" target="_blank">Download<ion-icon :src="cloudDownload"></ion-icon></ion-button>
       
        <ion-buttons>
       
        <ion-button color="danger" @click="deleteArchive(archive.id)">Supprimer<ion-icon :src="trash"></ion-icon></ion-button>
      
             <ion-button class="lk" color="success">Modifier<ion-icon :src="create"></ion-icon>
          
             </ion-button>
                </ion-buttons>
      </ion-card>
        
      </ion-item>
       </div>
    </ion-content>
    <ion-footer collapse="fade">
   
  

        <ion-fab-button  router-link="/addarchives">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
    
 
  </ion-footer>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonFooter,IonCard,IonCardTitle,IonCardHeader
 ,IonButton,IonItem,IonFabButton,IonIcon,toastController,IonSearchbar,IonBackButton,IonButtons
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical,cloudDownload} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      archives: [], 
      search:"",
      nbrs:"",
      url:"http://192.168.125.159:8000"
    }
    
  },methods:{
    deleteArchive(archiveId: any) {
                axios.delete(this.url+'/api/deletearchive/'+archiveId  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/archive')
      .then(res => this.archives = res.data)
    
      await toast.present();
          this.$router.push({name:'ArchivesPage'});
      })  
  },
    searche(){
        
        if(this.search !=""){
         axios
         .get(this.url+'/api/searcharchive/'+this.search)
        .then(response => (this.archives = response.data))
        .catch(error => console.log(error))
        
        } else {
          axios.get(this.url+'/api/archive')
          .then(response => (this.archives = response.data))
        .catch(error => console.log(error))
        }
    }
  
  },
  created() {
    axios.get(this.url+'/api/archive')
      .then(res => this.archives = res.data)
      
    
  },name: 'ArchivessPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonToolbar,
    IonButton
 ,IonItem,IonIcon,IonBackButton,IonButtons
,IonFabButton,IonFooter,IonCard,IonCardTitle,IonCardHeader,IonSearchbar
  },setup(){
    
  

    return {trash,create,add,swapVertical,cloudDownload};
   
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
.lk{margin-left: 30%;}

.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
.co{background-color: rgb(253, 253, 173);}
</style>
