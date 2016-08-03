$(document).ready(function(){
		$("#table").validate({
			rules:{
				admin_name:{
					required:true,
					checkName:true,
				},
				name:{
					required:true,					
				},
				admin_pwd:{
					required:true,
					checkPwd:true,
				},
				con_pwd:{
					required:true,
					equalTo:admin_pwd,
				},
				email:{
					required:true,
					checkEmail:true,
				},
				qq:{
					required:true,
					checkQQ:true,
				},
				s_page:{
					url:true,
					
				},
				check:{
					//required:true,
					//remote:{
						//url:"__CONTROLLER__/check?check="+$("#icode").val,
						//__CONTROLLER__表示当前控制器
						//dataType:"json",
					//}
				}
			},
			messages:{
				admin_name:{
					required:"*必填！",
					rangelength:"*长度为2到10位！",
				},
				name:{
					required:"*必填！",
				},
				admin_pwd:{
					required:"*必填！",
					rangelength:"*长度为6到16位！",
				},
				con_pwd:{
					required:"*必填！",
					equalTo:"*两次输入的密码不一致！"
				},
				email:{
					required:"*必填！",
					email:"*请输入正确的邮箱！",
				},
				qq:{
					required:"*必填！",
				},
				s_page:{
					url:"*请输入正确的网页地址！",
				},
				check:{
					required:"*必填！",
					remote:"*验证码有误！",
				},
			},
			//是否在获取焦点时验证
			//onfocusout:false,
			//是否在敲击键盘时验证
			//onkeyup:false,
			//提交表单后，（第一个）未通过验证的表单获得焦点
			focusInvalid:true,
			//当未通过验证的元素获得焦点时，移除错误提示
			focusCleanup:true,
		});
		
		//自定义正则表达示验证方法
		$.validator.addMethod("checkQQ",function(value,element,params){
				var checkQQ = /^[1-9][0-9]{4,19}$/;
				return this.optional(element)||(checkQQ.test(value));
			},"*请输入正确的QQ号码！");
			
		$.validator.addMethod("checkEmail",function(value,element,params){
				var checkEmail = /^[a-z0-9]+@([a-z0-9]+\.)+[a-z]{2,4}$/i;
				return this.optional(element)||(checkEmail.test(value));
			},"*请输入正确的邮箱！");
			
		$.validator.addMethod("checkName",function(value,element,params){
				var checkName = /^\w{2,10}$/g;
				return this.optional(element)||(checkName.test(value));
			},"*帐号须由2-10个字符组成！");
		
		$.validator.addMethod("checkPwd",function(value,element,params){
				var checkPwd = /^\w{6,16}$/g;
				return this.optional(element)||(checkPwd.test(value));
			},"*密码须由6-16个字符组成！");
		
	});