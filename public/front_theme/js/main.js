var app = new Vue({
	el: '#root',
	data: {
		stepOne: true,
		stepTwo: false,
		stepThree: false,
		depart_type: 'null',
		depart_adress: 'null',
		depart_airport_station: 'null',
		arrival_adress: 'null',
		arrival_airport_station: 'null',
		depart_name: 'empty',
		arrival_name: 'empty',
		bagage : 0,
		cabine : 0,
		passenger : 1,
		ar : false,
		selected: 'null',
		gare: 'null',
		dep: 'null',
		trajet : true,
		tarifs : false,
		reservation : false,
		addre : '',
		dest : '',
		showdestin : 'false',
		price: 0,
		step:'traject',
		firstname: '',
		lastname: '',
		phone: '',
		email: '',
		adress: '',
		start_date: '',
		start_hour: '',
		num: '',
		end_date: '',
		end_hour: '',
		comment: '',
		inv : 0,
		tmp : 0,
		artmp : false,
		showAED: false,
	},
	methods:{
		getDepart(){
			if(this.depart_type == 'adress'){
				return this.depart_adress;
			}else{
				if(this.depart_type == 'airport_station'){
					return this.depart_airport_station;
				}else{
					return this.depart_type;
				}
			}
		},
		getArrival(){
			if(this.depart_type == 'adress'){
				return this.arrival_airport_station;
			}else{
				if(this.depart_type == 'airport_station'){
					return this.arrival_adress;
				}else{
					return this.depart_type;
				}
			}
		},
		getPrice(){
			axios.get('/booking-price/'+this.getDepart()+'/'+this.getArrival()).then(response => this.price = response.data);

			if(this.ar == true){
				this.tmp = this.price + this.price;
			}else{
				this.tmp = this.price;
			}

			return this.tmp;
		},
		getDepartName(){
			if(this.depart_name != null){
				axios.get('/town-name/'+this.getDepart()).then(response => this.depart_name = response.data);
				return this.depart_name;
			}
		},
		getArrivalName(){
			if(this.arrival_name != null){
				axios.get('/town-name/'+this.getArrival()).then(response => this.arrival_name = response.data);
				return this.arrival_name;
			}
		},
		showPrice(){
			if(this.depart_type != 'null'){
				if(this.depart_type === 'adress' && this.depart_adress != 'null'
					 && this.arrival_airport_station != 'null'){
					this.step = 'price';
				}else{
					if(this.depart_type === 'airport_station' && this.depart_airport_station != 'null' 
							&& this.arrival_adress != 'null'){
						this.step = 'price';
					}else{
						sweetAlert("Oops...", "Veuillez remplir l\'addresse de départ et de destination", "error");
					}
				}
			}else{
				sweetAlert("Oops...", "Veuillez remplir l\'addresse de départ et de destination", "error");
			}
		},		
		showTraject(){
			this.step = 'traject';
		},		
		showBooking(){
			this.step = 'booking';
		},
		onSubmit(){
			//check coordoonée
			if(this.firstname !== '' &&	this.lastname !== '' &&	this.phone !== '' &&
				this.email !== '' && this.adress !== '' && $('#datetimepicker4').val() !== '' &&
				$('#datetimepicker5').val() !== '' && this.num !== ''){
				if(this.ar == true){
					//check date retour
					if($('#datetimepicker6').val() !== '' &&
							$('#datetimepicker7').val() !== ''){
						//$('booking-form').submit();
						document.getElementById("booking-form").submit();
					}else{
						sweetAlert("Oops...", "Veuillez remplir tout les champs", "error");
					}
				}else{
					document.getElementById("booking-form").submit();
				}
			}else{
				sweetAlert("Oops...", "Veuillez remplir tout les champs", "error");
			}
		},
		showStepOne(){
			this.stepOne = true;
			this.stepTwo = false;
			this.stepThree = false;
		},
		showStepTwo(){
			this.stepOne = false;
			this.stepTwo = true;
			this.stepThree = false;
		},
		showStepThree(){
			this.stepOne = false;
			this.stepTwo = false;
			this.stepThree = true;
		},
	},
	computed:{
		isStepOne(){
			return this.stepOne;
		},
		isStepTwo(){
			return this.stepTwo;
		},
		isStepThree(){
			return this.stepThree;
		},
		isDeparTypeAirportStation(){
			return this.depart_type == 'airport_station';
		},
		isDeparTypeAdress(){
			return this.depart_type == 'adress';
		},		
		isTraject(){
			return this.step == 'traject';
		},		
		isPrice(){
			return this.step == 'price';
		},		
		isBooking(){
			return this.step == 'booking';
		},
		isAR(){
			return this.ar == 1;
		},
		isErro(){
			return this.price == 0;
		},
		isShowAED(){
			return this.showAED;
		}
	}
})
