using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class moveToPlayer : MonoBehaviour
{
    public float speed;

    void Update()
    {
        move();
    }

    void move()
    {
        transform.position += Vector3.left * speed * Time.deltaTime;
    }
}
