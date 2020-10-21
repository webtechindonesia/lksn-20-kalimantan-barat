<template>
    <div>
        <header>
           <h2>YukPilih</h2>
           <nav>
               <div class="username">{{ me.username }}</div>
               <a href="#" @click.prevent="logout">logout</a>
           </nav>
        </header>
        <div class="container">
            <div class="card" v-for="poll in polls" :key="poll.id">
                <div class="poll-title">
                    <h3>{{ poll.title }}</h3>
                    <button v-if="me.role == 'admin'" class="btn del" @click="del(poll.id)">Delete</button>
                </div>
                <p class="small">created by: {{ poll.created_by }} | deadline: {{ poll.deadline | date }}</p>

                <p class="desc">{{ poll.description }}</p>


                <div class="choise-list" v-if="me.role != 'admin'">
                    <div class="choice" v-for="choice in poll.choices" :key="choice.id">
                        <input :value="choice.id" @change="vote(poll.id, choice.id)" type="radio" name="choice" :id="`choice-${choice.id}`" class="radio">
                        <label :for="`choice-${choice.id}`">{{ choice.choice }}</label>
                    </div>
                </div>

                <div class="result-list">
                    <div class="result-item" v-for="result in poll.result" :key="result.id">
                        <div class="bar">
                            <div class="bar-fill" :style="barStyle(poll.result, result.point)"></div>
                        </div>
                        <div class="res-desc">
                            <div>{{ result.choice }}</div>
                            <div>{{ percent(poll.result, result.point) }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="fab" @click="create = true" v-if="me.role == 'admin'">+</div>
    <div class="overlay" v-if="create">
        <div class="modal">
            <form action="">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" v-model="poll.title">
                </div>
                <div class="form-group">
                    <label for="desc">desciption</label>
                    <textarea name="desc" id="desc" v-model="poll.description"></textarea>
                </div>
                <div class="form-group">
                    <label for="title">deadline</label>
                    <input type="datetime-local" v-model="poll.deadline">
                </div>
                <div class="choice-list">
                    <div class="form-group" v-for="(length, index) in poll.choices" :key="length.id">
                        <label for="title">choice</label>
                        <input @keydown.once="addChoice" type="text" v-model="poll.choices[index]">

                    </div>
                </div>
                <div class="control">
                    <div class="btn cancel" @click="create = false">Cancel</div>
                    <div class="btn send" @click="createC">Create</div>
                </div>
            </form>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            user: JSON.parse(localStorage.getItem('poll_user')),
            me: {},
            polls: [],
            create: false,
            poll: {
                title: '',
                description: '',
                deadline: '',
                choices: ['']
            }
        }
    },
    mounted() {
        this.getUser()
        this.fetchPoll()
    },
    methods: {
        percent(all, res) {
            let check = all.every((val)=> {
                return val.point == 0
            })
            if(check) return 0

            let sum = all.reduce((total, val) => {
                return total + val.point;
            }, 0)
            console.log(res)
            return parseInt((res / sum) * 100)
        },
        barStyle(all, res) {
            // console.log(all,res)
            let max = 70;

            let temp = max / all.length

            return {
                width: `${(temp*res)/all.length}px`
            }
        },
        addChoice() {
            this.poll.choices = [...this.poll.choices, '']
        },
        vote(voteId, choiceId) {
            axios.post(`poll/${voteId}/vote/${choiceId}`, {}, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            }).then(res => {
                console.log(res)
                alert(res.data.message)
                this.fetchPoll()
            }).catch(err => alert(err.response.data.message))
        },
        getUser() {
            axios.post(`auth/me`, {}, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            }).then(res => {
                this.me = res.data

            })
        },
        fetchPoll() {
            axios.get(`poll`, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            })
            .then(res => {
                this.polls = res.data
            })
        },
        logout() {
            axios.post(`auth/logout`, {}, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            })
            .then(res => {
                console.log(res);
                localStorage.removeItem('poll_user');
                this.$router.push('/login')
            })
        },
        del(id) {
            axios.delete(`poll/${id}`, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            })
            .then(res =>{
                alert('success')
                console.log(res)
                this.fetchPoll();
            })
        },
        createC() {
            if(this.poll.choices[this.poll.choices.length - 1] == "") this.poll.choices.pop()

            axios.post(`poll`, this.poll, {
                headers: {
                    'Authorization': `Bearer ${this.user.access_token}`
                }
            })
            .then(res => {
                this.fetchPoll()
                this.create = false
                console.log(res)
            })
        }
    }
}
</script>

<style>
.result-item {
    display: flex;
    align-items: center;
}
.modal .form-group {
    display: flex;
    flex-direction: column;
    margin: 10px;
}
.control {
    display: flex;
    margin-top: 20px;
}
.control .btn {
    font-size: 13px;
    padding: 10px;
}
.overlay {
    background: rgba(0,0,0,0.8);
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 5px;
    padding: 20px;
}
.choise-list {
    border: 1px solid darkblue;
    border-radius: 5px;
    margin-top: 20px;
    width: 20%;
}
.choice {
    padding: 10px;
    border-bottom: 1px solid darkblue;
    display: flex;
    align-items: center;
}
.radio {
    margin-right: 10px;
}
.bar {
    background: #ddd;
    height: 3px;
    max-width: 70px;
    width: 100px;
    position: relative;
}
.bar-fill {
    position: absolute;
    top: 0;
    left: 0;
    height: 3px;
    background: darkblue;
}
.fab {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: white;
    background: darkblue;
    border-radius: 50%;
}
.small {
    font-size: 14px;
    margin-bottom: 20px;
    color: rgb(102, 102, 102);
}
    header {
        height: 80px;
        background: darkblue;
        color: white;
        padding: 0 100px;
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: space-between;
    }
    nav {
        display: flex;
        
    }
    header a {
        color: white;
    }
    .username {
        margin-right: 20px;
    }
    .card {
        padding: 20px;
        line-height: 1.5;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
        border: 1px solid #ccc;
        margin: 20px;
    }
    .del {
        background: #aaa;
        padding: 12px 20px;
        border: none;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
    }
    .cancel {
        background: red;
        margin-right: 10px;
    }
    .send {
        background: green;
    }
    .poll-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
</style>