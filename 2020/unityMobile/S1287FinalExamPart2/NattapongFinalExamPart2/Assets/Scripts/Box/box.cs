using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class box : MonoBehaviour
{
    public Vector2 knockback;

    private void OnCollisionEnter2D(Collision2D other) 
    {
        if (other.gameObject.tag == "Player")
        {
            FindObjectOfType<AudioManager>().Play("hit");
            other.gameObject.GetComponent<PBallCharController>().HitAnim();
            other.gameObject.GetComponent<Rigidbody2D>().AddForce(knockback, ForceMode2D.Impulse);
        }

    }

}
