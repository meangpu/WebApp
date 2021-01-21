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

    void Update()
    {
        // left =-1 right = 1
        horizontalMove = Input.GetAxisRaw("Horizontal") * runSpeed;

        if (Input.GetButtonDown("Jump"))
        {
            jump = true;
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
    void FixedUpdate() {
        // move not crouch not jump
        controller.Move(horizontalMove * Time.fixedDeltaTime, crouch, jump);
        jump = false;
    }
}
