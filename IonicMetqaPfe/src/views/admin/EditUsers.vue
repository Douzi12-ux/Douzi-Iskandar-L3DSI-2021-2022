<template >
  <ion-page >
  <ion-content :fullscreen="true">
    <ion-header :translucent="true" >
      <ion-toolbar class="hh" color="primary">
        <ion-buttons slot="start">
                <ion-back-button defaultHref="/users"></ion-back-button>
              </ion-buttons>
        <ion-title> Modifier Utilisateur</ion-title>
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    </ion-header>
    

      <ion-content>
        <div class="content">
      <form>

    <ion-item lines="full">
      <ion-label position="floating">Nom</ion-label>
       <ion-icon slot="start" name="mail" ></ion-icon>
      <ion-input type="text" name="person" v-model="name" required></ion-input>
    </ion-item>

    <ion-item lines="full">
      <ion-label position="floating">Email</ion-label>
       <ion-icon slot="start" name="mail" ></ion-icon>
      <ion-input type="text" name="email" v-model="email" required></ion-input>
    </ion-item>

    <ion-item lines="full">
      <ion-label position="floating">Password</ion-label>
       <ion-icon slot="start" name="key" ></ion-icon>
      <ion-input type="text" name="password" v-model="password" required></ion-input>
    </ion-item>

    <ion-item >
            <ion-label>Role</ion-label>
             <ion-icon slot="start" name="shirt" ></ion-icon>
            <ion-select  name="role" v-model="role" >
              <ion-select-option v-for="role in roles" :key="role" :value="role.id">{{role.name}}</ion-select-option>
              </ion-select>
    </ion-item>

    <ion-item >
            <ion-label>Departement</ion-label>
            <ion-icon slot="start" name="home" ></ion-icon>
            <ion-select  name="iddepartement" v-model="iddepartement">
              <ion-select-option v-for="departement in departements" :key="departement" :value="departement.id">{{departement.name}}</ion-select-option>
              </ion-select>
    </ion-item>

    <ion-row>
      <ion-col>
      <ion-button class="a" v-on:click="modifierUser(this.$route.params.id)">Confirmer</ion-button>
      </ion-col>
      <ion-col>
      <ion-button  color="danger" router-link="/users">Annuler</ion-button>
      </ion-col>
    </ion-row>
  </form>
      </div>
   </ion-content>
  </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar,IonButton,IonInput,IonLabel,
IonItem,IonBackButton,IonButtons,IonSelect,IonSelectOption,IonCol,IonRow,toastController} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { mail,key,person,shirt,home } from 'ionicons/icons';
addIcons(
    { 
       "mail":mail,"key":key,"person":person,"shirt":shirt,"home":home
    }
    )
import axios from 'axios';
export default defineComponent({
   data() {
    return {
      id:this.$route.params.id,
          name:this.$route.params.name,
          role:this.$route.params.role,
          email:this.$route.params.email,
          password:this.$route.params.password,
          iddepartement:this.$route.params.iddepartement,
        
      roles: [],
      departements: [],
      users:[],
      
      url:"http://192.168.125.159:8000"
     
    }
    
  },methods:{
    modifierUser(id: any){
      axios.put(this.url+'/api/user/'+id,
           { 
                    name:this.name,
                    role:this.role,
                    email:this.email,
                    password:this.password,
                    iddepartement:this.iddepartement,
                
                 }).then(async ()=>{
                    const toast = await toastController.create({
                     color: 'success',
                   duration: 2000,
                 message: 'Modifé avec succès',
         
      });
               await toast.present();
               this.$router.push({name:'UsersPage'});
                 });
  }
  },
  created() {
     axios.get(this.url+'/api/role')
      .then(res => this.roles = res.data)
    axios.get(this.url+'/api/departement')
      .then(res => this.departements = res.data)
      axios.get(this.url+'/api/user')
      .then(res => this.users = res.data)
      
  },setup(){
    
  

    return {mail,key };
   
  },
  name:'EditUsers',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,
    IonButton,
    IonInput,
    IonLabel,

    IonItem,
   IonBackButton,
   IonButtons
    ,IonSelect,IonSelectOption,IonCol,IonRow
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
template{color:aqua;}
.a{
  margin-left: 20%;
  background-color: blue;
  }

.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
 
</style>