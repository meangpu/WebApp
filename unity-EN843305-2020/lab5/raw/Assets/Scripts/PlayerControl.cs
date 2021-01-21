using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerControl : MonoBehaviour
{


    public bool isLeft;
    public bool isRight;
    public bool isJump;
    Rigidbody2D rb;


    

    public void SetLeft(bool b){
        isLeft = b;
    }
    public void SetRight(bool b){
        isRight = b;
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
        if (Input.GetKeyDown("d")){
            SetRight(true);
        }
        if (Input.GetKeyUp("d")){
            SetRight(false);
        }
        if (Input.GetKeyDown("space")){
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
            rb.AddForce(Vector2.left *10);
        }
        else if (isRight)
        {
            rb.AddForce(Vector2.right *10);
        }


        if (isJump)
        {
            rb.AddForce(Vector2.up * 200);
            isJump = false;
        }


    }

    





}
