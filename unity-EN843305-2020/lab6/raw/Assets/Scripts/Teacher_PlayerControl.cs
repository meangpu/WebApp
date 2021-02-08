using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Teacher_PlayerControl : MonoBehaviour
{


    public float playerXSpeed = 2.0f;
    public float playerDownSpeed = 1.0f;
    public float playerJumpStrength = 800.0f;
    public bool isLeft;
    public bool isRight;
    public bool isDown;
    public bool isJump;
    Rigidbody2D rb;


    

    public void SetLeft(bool b){
        isLeft = b;
    }
    public void SetRight(bool b){
        isRight = b;
    }
    public void SetDown(bool b){
        isDown = b;
    }
    public void SetJump(bool b){
        isJump = b;
    }


    void KeyboardControl()
    {
        if (Input.GetKeyDown("a")){
            SetLeft(true);
        }
        if (Input.GetKeyUp("a")){
            SetLeft(false);
        }
        if (Input.GetKeyDown("s")){
            SetDown(true);
        }
        if (Input.GetKeyUp("s")){
            SetDown(false);
        }
        if (Input.GetKeyDown("d")){
            SetRight(true);
        }
        if (Input.GetKeyUp("d")){
            SetRight(false);
        }
        if (Input.GetKeyDown("space") || Input.GetKeyDown("w")){
            SetJump(true);
        }
    }



    void Start() 
    {
        rb = gameObject.GetComponent<Rigidbody2D>();
    }

    void Update() {
        KeyboardControl();

        if (isLeft)
        {
            rb.AddForce(Vector2.left * playerXSpeed);
        }
        else if (isRight)
        {
            rb.AddForce(Vector2.right * playerXSpeed);
        }

        if (isDown)
        {
            rb.gravityScale = 8f;
        }
        else
        {
            rb.gravityScale = 3.0f;
        }


        if (isJump)
        {
            rb.AddForce(Vector2.up * playerJumpStrength);
            isJump = false;
        }


    }

    





}
