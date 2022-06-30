<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar  class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/adminhome"></ion-back-button>
          <ion-text><h3>Reclamations</h3></ion-text>
        </ion-buttons>
      </ion-toolbar>
    <img class="rr" src="assets/logo.png" />

    </ion-header>
    
    
      <ion-header :translucent="true" >
      <ion-content>
      <ion-fab horizontal="end" vertical="top" slot="fixed" edge>
        <ion-fab-button router-link="/addreclamation">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
      </ion-fab>
      
      </ion-content>
    </ion-header>
    <ion-content>
      <div class="content">
      
      <ion-item v-for="reclamation in reclamations" :key="reclamation">
        <ion-card style="width:100%" >
        
       <ion-card-header>
          <ion-card-title v-if='(reclamation.matrielAReparer!=null)&&(reclamation.matrielAReparer!="=>")'>
          <ion-card-title v-html="'Les matriel A Reparer : <br/>'+reclamation.matrielAReparer"></ion-card-title><br/>
          </ion-card-title>
  
          <ion-card-title v-if='(reclamation.problems!="=>")&&(reclamation.problems!=null)'> 
          <ion-card-title v-html="'Les probleme : <br/>'+reclamation.problems"> </ion-card-title>
          </ion-card-title>

          
          <ion-card-title v-if="reclamation.details!=null">details : {{reclamation.details}}</ion-card-title><br/>
          
          <ion-card-title v-if='(reclamation.Autres!="=>")&&(reclamation.Autres!=null)'>
          <ion-card-title v-html="'Les autre probleme : <br/>'+reclamation.Autres"></ion-card-title> <br/>
          </ion-card-title>
          
          <ion-card-title v-if="reclamation.autresdetails!=null">{{reclamation.autresdetails}}</ion-card-title><br/>
          <ion-card-title v-if="reclamation.plusdetail!=null">{{reclamation.plusdetail}}</ion-card-title>
          
          
          <ion-card-title v-if="reclamation.status==0">
          <ion-button id="f"  expand="full" fill="outline" class="userUnFollow"> En Cours..</ion-button>
          <ion-row>
            <ion-col>
              <ion-button class="a" >Modifier</ion-button>
            </ion-col>
            <ion-col>
              <ion-button color="danger"  @click="deleted(reclamation.id)">Supprimer</ion-button>
            </ion-col>
          </ion-row>
          </ion-card-title>
          <ion-card-title v-if="reclamation.status==1"><ion-button id="f" color="success" expand="full" fill="outline" class="userUnFollow"> Confirmer</ion-button>  </ion-card-title>
          <ion-card-title v-if="reclamation.status==2"><ion-button id="f"  color="danger" expand="full" fill="outline" class="userUnFollow"> Refuser</ion-button>  </ion-card-title>

       
       </ion-card-header>
        
                
      </ion-card>
           
      </ion-item>
  </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonButtons,IonBackButton
 ,IonButton,IonItem,IonCard,IonFab,IonFabButton,IonCardTitle,IonIcon,toastController
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      reclamations: [], 
      search:"",
      nbrs:"",
      url:"http://192.168.125.159:8000"
    }
    
  },methods:{
    deleted(Id: any) {
                axios.delete(this.url+'/api/deletereclamation/'+Id  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/reclamation')
      .then(res => this.reclamations = res.data)
    
      await toast.present();
          this.$router.push({name:'ReclamationPage'});
      })  
  }
    
  
  },
  created() {
    axios.get(this.url+'/api/reclamation')
      .then(res => this.reclamations = res.data)
    
  },name: 'ReclamationPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,

    IonToolbar,
    IonButton
 ,IonItem,IonIcon
 ,IonCard,IonCardTitle
,IonFab,IonFabButton,IonButtons,IonBackButton
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
#a{flex-wrap: wrap}

.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
.co{background-color: rgb(253, 253, 173);}
</style>
