<template>
    <div>
        <div class="container">
            <form action="" @submit.prevent="resetPass">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" v-model="loginData.old_password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" v-model="loginData.new_password">
                </div>
                <div class="form-group">
                    <label for="conf_pass">Password</label>
                    <input type="password" v-model="confPass">
                </div>
                <button class="btn">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            loginData: {
                old_password: '',
                new_password: ''
            },
            confPass: '',
            user: JSON.parse(localStorage.getItem('poll_user'))
        }
    },
    methods: {
        resetPass() {
            if(this.loginData.new_password != this.confPass) {
                alert('Password not match');
                return;
            }

            axios.post(`auth/reset_password`, this.loginData, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            })
                .then(res => {
                    console.log(res)

                    this.$router.push('/login')
                })
                .catch(err => {
                    alert(err.response.data.message)
                })
        }
    }
}
</script>