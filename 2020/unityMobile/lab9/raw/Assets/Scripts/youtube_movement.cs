using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class youtube_movement : MonoBehaviour
{

    public CharacterController2D controller;
    float horizontalMove = 0f;
    public float runSpeed = 50.0f;
    bool jump = false;
    bool crouch = false;

    public int playerDirection = 0;
    public Animator animator;



    // for ui button
    public void SetMoveLeft(bool b)
    {
        if (b)
        {
            playerDirection = -1;
        }
        else
        {
            playerDirection = 0;
        }
        
    }

    public void SetMoveRight(bool b)
    {
        if (b)
        {
            playerDirection = 1;
        }
        else
        {
            playerDirection = 0;
        }
    }

    public void SetButtonjump()
    {
        jump = true;
        animator.SetBool("jumping", true);
    }

    
    void Update()
    {
        
        if (playerDirection == 0){
            // left =-1 right = 1
            horizontalMove = Input.GetAxisRaw("Horizontal") * runSpeed;
            // make value alway positive to make animation alway played the right way
            animator.SetFloat("speed", Mathf.Abs(horizontalMove));
        } 
        else if (playerDirection == 1)
        {
            horizontalMove = 1 * runSpeed;
            animator.SetFloat("speed", Mathf.Abs(horizontalMove));
        }
        else if (playerDirection == -1)
        {
            horizontalMove = -1 * runSpeed;
            animator.SetFloat("speed", Mathf.Abs(horizontalMove));
        }


        if (Input.GetButtonDown("Jump"))
        {
            jump = true;
            animator.SetBool("jumping", true);
        }
        if (Input.GetButtonDown("Crouch"))
        {
            crouch = true;
        }
        else if (Input.GetButtonUp("Crouch"))
        {
            crouch = false;
        }
    }


    // run at fixed time so the speed of computer dosen't matter
    void FixedUpdate() 
    {
        // move not crouch not jump
        controller.Move(horizontalMove * Time.fixedDeltaTime, crouch, jump);
        jump = false;
    }


    public void OnLanding()
    {
        animator.SetBool("jumping", false);
    }
}
