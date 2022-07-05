import React, { useState } from "react";
import { Link, useHistory } from "react-router-dom";
import "../../../assets/frontend/css/login-signup.css";
import register from "../../../assets/frontend/img/login.svg";
import axios from "axios";
import swal from "sweetalert";

function Register() {
  const history = useHistory();

  // registerInput: get value from user and assign in registerInput
  const [registerInput, setRegister] = useState({
    name: "",
    email: "",
    password: "",
    error_list: [],
  });

  const handleInput = (e) => {
    e.persist();
    // ...registerInput: Lấy all giá trị user đã nhập
    setRegister({ ...registerInput, [e.target.name]: e.target.value });
  };

  const registerSubmit = (e) => {
    e.preventDefault();
    // Lấy tất cả dữ liệu mỗi khi submit
    const data = {
      name: registerInput.name,
      email: registerInput.email,
      password: registerInput.password,
    };
    axios.get("/sanctum/csrf-cookie").then((response) => {
      axios.post(`/api/register`, data).then((res) => {
        if (res.data.status === 200) {
          // Lưu trữ data trong localStorage
          localStorage.setItem("auth_token", res.data.token);
          localStorage.setItem("auth_name", res.data.username);
          // notification message success
          swal("Success", res.data.message, "success");
          history.push("/");
        } else {
          // trả về lỗi khi người dùng input
          setRegister({
            ...registerInput,
            error_list: res.data.validation_errors,
          });
        }
      });
    });
  };

  return (
    <div>
      <div className="container">
        <div className="forms-container">
          <div className="signin-signup">
            <form onSubmit={registerSubmit}>
              <h2 className="title">Sign up</h2>
              {/* Name */}
              <div className="input-field mb-3">
                <i
                  className="fas fa-envelope"
                  style={{ marginRight: "10px" }}
                ></i>
                <input
                  type="text"
                  name="name"
                  placeholder="Your Name"
                  onChange={handleInput}
                  value={registerInput.name}
                />
                <span className="text-danger">
                  {registerInput.error_list.name}
                </span>
              </div>

              {/* Email */}
              <div className="input-field mb-3">
                <i
                  className="fas fa-envelope"
                  style={{ marginRight: "10px" }}
                ></i>
                <input
                  type="email"
                  name="email"
                  placeholder="Email Address"
                  onChange={handleInput}
                  value={registerInput.email}
                />
                <span className="text-danger">
                  {registerInput.error_list.mail}
                </span>
              </div>

              {/* Password */}
              <div className="input-field mb-3">
                <i className="fas fa-lock" style={{ marginRight: "10px" }}></i>
                <input
                  type="password"
                  name="password"
                  placeholder="Password"
                  onChange={handleInput}
                  value={registerInput.password}
                />
                <span className="text-danger">
                  {registerInput.error_list.password}
                </span>
              </div>
              {/* <div className="input-field">
                <i className="fas fa-lock" style={{ marginRight: "10px" }}></i>
                <input
                  type="password"
                  placeholder="Confirm Password"
                  name="password_confirmation"
                />
                <span className="text-danger">
                  {registerInput.error_list.password_confirmation}
                </span>
              </div> */}

              <button type="submit" className="btn">
                Register
              </button>
              <p className="social-text">Or Sign up with social platforms</p>
              <div className="social-media">
                <Link to="#" className="social-icon">
                  <i className="fab fa-facebook-f"></i>
                </Link>
                <Link to="#" className="social-icon">
                  <i className="fab fa-google"></i>
                </Link>
              </div>
            </form>
          </div>
        </div>
        <div className="panels-container">
          <div className="panel left-panel">
            <div className="panel left-panel">
              <div className="content">
                <h3>Sign in ?</h3>
                <p>Go to Login Page right here!</p>
                <Link to="" className="btn transparent" id="sign-in-btn">
                  Sign in
                </Link>
              </div>
              <img src={register} className="image" alt="Login here" />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Register;
