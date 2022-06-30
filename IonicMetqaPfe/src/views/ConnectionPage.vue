<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/"></ion-back-button>
          <ion-title>Connecter</ion-title>
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
      <form >


        <ion-item lines="full">
          <ion-label position="floating">Email</ion-label>
          <ion-icon slot="start" name="mail" ></ion-icon>
          <ion-input type="email" v-model="email" required></ion-input>

        </ion-item>

        <ion-item lines="full">
          <ion-label position="floating">Mot de Passe</ion-label>
          <ion-icon slot="start" name="key" ></ion-icon>
          <ion-input type="password" v-model="pass" required></ion-input>

        </ion-item>

        <ion-row>
          <ion-col>
            <ion-button class="buttonn" @click="login()">Confirmer</ion-button>
          </ion-col>
        </ion-row>
      </form>
      </div>
    </ion-content>

  </ion-page>
</template>

<script lang="ts">
import {
  IonContent, IonHeader,loadingController, IonPage, IonTitle, IonToolbar, IonButtons, IonBackButton,IonIcon, IonItem, IonLabel, IonButton, IonCol, IonRow,
  IonInput
} from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios';
import { addIcons } from 'ionicons'
import { mail,key } from 'ionicons/icons';
addIcons(
    { 
       "mail":mail,"key":key
    }
    )
export default defineComponent({
  name: 'ConnectionPage',
  data() {
    return {
      email: "",
      pass: "",
      url:"http://192.168.125.159:8000"
    }
  },
  created(){
    if (localStorage.getItem('token')) {
      this.$router.go(-1);
    }
  },
  methods: {
    login() {
      axios.post(this.url+'/api/login',{
        email:this.email,
        password:this.pass
      }).then(async (resp)=>{
        const loading = await loadingController
        .create({
          cssClass: 'my-custom-class',
          message: 'Please wait...',
          duration: 1300,
        });
        
      await loading.present();
        localStorage.setItem('token',resp.data.token);
        localStorage.setItem('name',resp.data.user.name);
        localStorage.setItem('id',resp.data.user.id);
        localStorage.setItem('email',resp.data.user.email);
        localStorage.setItem('role',resp.data.user.role);
        localStorage.setItem('departement',resp.data.user.iddepartement);
        if (resp.data.user.role == 1) {
          this.$router.push('/adminhome')
        } else if(resp.data.user.role == 2) {
           this.$router.push('/clienthome')
        }else if(resp.data.user.role == 3) {
           this.$router.push('/chefhome')
        }else{
        this.$router.push('/ingenieurhome')
        }
   
      })
    }
  },
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar, IonButtons, IonBackButton, IonItem, IonLabel, IonButton, IonCol, IonRow,
    IonInput,IonIcon
  },setup(){
    
  

    return {mail,key};
   
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
