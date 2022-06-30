<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar  class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/adminhome"></ion-back-button>
          <ion-text><h3>Utilisateurs</h3></ion-text>
        </ion-buttons>
      </ion-toolbar>
    <img class="rr" src="assets/logo.png" />
    <ion-searchbar class="co" v-model="search" @keyup="searche()"></ion-searchbar>
    </ion-header>
    
    
      <ion-header :translucent="true" >
      <ion-content>
      <ion-fab horizontal="end" vertical="top" slot="fixed" edge>
        <ion-fab-button router-link="/addusers">
          <ion-icon :src="add" ></ion-icon>
        </ion-fab-button>
      </ion-fab>
      
      </ion-content>
    </ion-header>
    <ion-content>
      <div class="content">
      
      <ion-item v-for="user in users" :key="user">
        <ion-card style="width:100%" >
        
        <ion-card-header>
          <ion-card-title>Nom : {{user.name}} </ion-card-title>
          <ion-card-title>Email : {{user.email}}</ion-card-title>
          <ion-card-title>Role : {{user.role}} </ion-card-title>
          
        </ion-card-header>
        
        <ion-button id="f" color="danger" @click="deleteUser(user.id)">Supprimer<ion-icon :src="trash"></ion-icon></ion-button>
      <router-link
                            :to="{ name: 'EditUsers', 
                  params: { 
                    id:user.id,
                    name:user.name,
                    role:user.role,
                    email:user.email,
                   password:user.password,
               iddepartement:user.iddepartement
                          } 
                      }">
             <ion-button id="f" color="success" href="/editusers">Modifier</ion-button>
                </router-link>
      </ion-card>
           
      </ion-item>
  </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonSearchbar,IonButtons,IonBackButton
 ,IonButton,IonItem,IonCard,IonFab,IonFabButton,IonCardTitle,IonIcon,toastController
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  data() {
    return {
      users: [], 
      search:"",
      nbrs:"",
      url:"http://192.168.125.159:8000"
    }
    
  },methods:{
    deleteUser(userId: any) {
                axios.delete(this.url+'/api/deleteuser/'+userId  )
                    .then(async ()=>{
         const toast = await toastController.create({
        color: 'danger',
        duration: 2000,
        message: 'Supprimé avec succès',
        
      });
axios.get(this.url+'/api/user')
      .then(res => this.users = res.data)
    
      await toast.present();
          this.$router.push({name:'UsersPage'});
      })  
  },
    searche(){
        
        if(this.search !=""){
         axios
         .get(this.url+'/api/searchusers/'+this.search)
        .then(response => (this.users = response.data))
        .catch(error => console.log(error))
        
        } else {
          axios.get(this.url+'/api/user')
          .then(response => (this.users = response.data))
        .catch(error => console.log(error))
        }
    }
    
  
  },
  created() {
    axios.get(this.url+'/api/user')
      .then(res => this.users = res.data)
    
  },name: 'UsersPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonSearchbar,
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
