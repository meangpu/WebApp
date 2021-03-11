using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bird : MonoBehaviour
{
    Vector2 startPosition;
    public int forceFactor = 500;

    void Start()
    {
        GetComponent<Rigidbody2D>().isKinematic = true;
        startPosition = GetComponent<Rigidbody2D>().position;
    }

    void OnMouseDown() {
        GetComponent<SpriteRenderer>().color = Color.red;
    }

    void OnMouseUp() {
        Vector2 currentPosition = GetComponent<Rigidbody2D>().position;
        Vector2 direction = startPosition - currentPosition;
        direction.Normalize();
        GetComponent<Rigidbody2D>().isKinematic = false;
        GetComponent<Rigidbody2D>().AddForce(direction * forceFactor);
        GetComponent<SpriteRenderer>().color = Color.white;
    }

    void OnMouseDrag() {
        Vector3 mousePosition = Camera.main.ScreenToWorldPoint(Input.mousePosition);
        transform.position = new Vector3(mousePosition.x, mousePosition.y, transform.position.z);
    }


}
