<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
          <ion-buttons>
              <ion-back-button default-href="/"></ion-back-button>
              <ion-title>Inscription</ion-title>
          </ion-buttons>
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Blank</ion-title>
        </ion-toolbar>
      </ion-header>
  <div class="content"> 
  <form>
    <ion-item lines="full">
      <ion-label position="floating">Nom</ion-label>
      <ion-icon slot="start" name="person" ></ion-icon>
      <ion-input type="text" v-model="name" required></ion-input>
    </ion-item>

     <ion-item lines="full">
      <ion-label position="floating">Email</ion-label>
      <ion-icon slot="start" name="mail" ></ion-icon>
      <ion-input type="text" v-model="email" required></ion-input>
    </ion-item>

   <ion-item lines="full">
      <ion-label position="floating">Mot de Passe</ion-label>
      <ion-icon slot="start" name="key" ></ion-icon>
      <ion-input type="password" v-model="password" required></ion-input>
    </ion-item>

  

    <ion-row>
      <ion-col>
       <ion-button class="buttonn"  @click="add()">Confirmer</ion-button>
      </ion-col>
    </ion-row>
  </form>
  </div>
</ion-content>

  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar,IonButtons,IonBackButton,IonItem,IonLabel,
IonButton,IonCol,IonRow,loadingController,IonInput,toastController } from '@ionic/vue';
import axios from 'axios';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { mail,key,person } from 'ionicons/icons';
addIcons(
    { 
       "mail":mail,"key":key,"person":person
    }
    )

export default defineComponent({
  name: 'InscriptionPage',
  data() {
    return {
      name: "",
      email: "",
      password: "",
      url:"http://192.168.125.159:8000"
    }
  },

  methods: {
    add(){
      axios.post(this.url+'/api/inscriptionclient',{
        name:this.name,
        email:this.email,
        password:this.password,
      
        
      }).then(async ()=>{
         const toast = await toastController.create({
        color: 'secondary',
        duration: 3000,
        message: 'Vous Inscrit avec succès',
        
      });
      await toast.present();

      const loading = await loadingController
        .create({
          cssClass: 'my-custom-class',
          message: 'Please wait...',
          duration: 1300});
           await loading.present();
       this.$router.push('/home')
       
      })  
     
      }
  },
  
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,IonButtons,IonBackButton,IonItem,IonLabel,IonButton,IonCol,IonRow,
IonInput
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
.hh{height:100px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 10%;}
.buttonn{margin-left: 30%;}
</style>
